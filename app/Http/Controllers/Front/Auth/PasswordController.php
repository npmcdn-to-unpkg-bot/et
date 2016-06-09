<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\FrontController;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\Front\Front_User;

use Validator;
use Illuminate\Support\Facades\Input;

class PasswordController extends FrontController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
	
	protected $moduleName = 'auth'; // Khai báo module: Để phân chia chức năng cho dễ

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		parent::__construct();
    }
	
	public function getEmail() {
		return $this->loadView('email');
	}
	
	public function getReset($token) {
		return $this->loadView('reset')->with('token', $token);
	}
	
	public function getChange() {
		return $this->loadView('change');
	}
	
	public function postChange() {
		$Input = new Input;
		
		$v = Validator::make($Input::all(), [
            'old_password' => 'required|min:7|max:20',
            'password' => 'required|min:7|max:20|confirmed',
        ]);
		
		if ($v->fails()) {
			return redirect('password/change')->withErrors($v);
		}
		
		Front_User::where('user_id', $this->userData->user_id)
			->update(['password' => bcrypt($Input::get('password'))]);
		
		return redirect('password/change')->with('alert-success', trans('message.password_changed'));
	}
}
