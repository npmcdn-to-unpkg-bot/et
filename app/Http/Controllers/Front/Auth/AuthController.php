<?php

namespace App\Http\Controllers\Front\Auth;

use Mail;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Front\Front_User;
use Validator;
use App\Http\Controllers\FrontController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

class AuthController extends FrontController
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

	
	protected $moduleName = 'auth'; // Set Auth controller thuộc module Auth

	
	
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7|confirmed',
            'school_name' => 'required|max:255',
            'agree' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
		$activeCode = str_random(40);
		
        Front_User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'school_name' => $data['school_name'],
            'active_code' => $activeCode,
        ]);
		
		
		$toName = $data['firstname'];
		$toName .= (isset($data['middlename']) && $data['middlename']) ? ' '.$data['middlename'] : '';
		$toName .= $data['lastname'];
		
		$dataView['username'] = $toName;
		$dataView['activeUrl'] = url('auth/activation?email='.$data['email'].'&code='.$activeCode);
		
		// send mail active to user
//		Mail::send('email.active_code', $dataView, function($msg) use($data, $toName){
//			$msg->to($data['email'], $toName)
//				->subject(trans('text.subject_mail_active'));
//		});
    }
	
	function postRegister(Request $request) {
		$validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->create($request->all());

		return redirect('auth/registersuccess')->with('registered', true);
	}
	
	function getRegister() {
		return $this->loadView('register');
	}
	
	function getRegistersuccess() {
		if(Session::has('registered')) {
			return $this->loadView('register_success');
		}
		
		return redirect('');
	}
	
	function getLogin() {
		return $this->loadView('login');
	}


	/**
     * Handle an authentication attempt.
     * @return Response
     */
    public function postLogin(Request $request)
    {
		$Input = new Input;
		$InputAll = $Input::all();
		
		$v = Validator::make($InputAll, [
			'email' => 'required',
			'password' => 'required'
		]);
		
		if ($v->fails()) {
			return redirect('auth/login')->withErrors($v);
		}
		
		$credentials = $this->getCredentials($request);
		
		if (Auth::validate($credentials)) {
			$user = Auth::getLastAttempted();
			
			if ($user->active_flg == 1) { // Nếu đang active
				Auth::login($user, $Input::get('remember_me', false));
				return redirect()->intended($this->redirectPath());
			} elseif ($user->is_allow_login == 0) { // nếu không cho phép login
				return redirect('auth/login')->withErrors(['alert-danger' => trans('message.account_not_allow_login')]);
			} else {
				return redirect('auth/login')->withErrors(['alert-danger' => trans('message.account_not_actived')]);
			}
		}
		
		return redirect('auth/login')->withErrors(['alert-danger' => trans('message.login_unsuccess')]);
    }
	
	public function getLogout() {
		Auth::logout();
		
		return redirect('');
	}
	
	function getActivation() {
		$Input = new Input;
		
//		$user = Front_User::where('active_flg', 0)
//				->where('email', $Input::get('email', ''))
//				->where('active_code', $Input::get('code', ''))
//				->first();
		$user = Front_User::where('email', $Input::get('email', ''))
				->first();
		
		if (!$user) {
			return redirect('auth/activemsg')->with('fail', trans('message.active_fail'));
		}
		
		$user->active_flg = 1;
		$user->active_code = null;
		$user->save();
		
		return redirect('auth/login')->withErrors(['alert-success' => trans('message.active_success')]);
	}
	
	function getActivemsg() {
		return $this->loadView('active_msg');
	}
}
