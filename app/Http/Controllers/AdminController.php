<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Helpers\MyHelper;

class AdminController extends Controller
{
	protected $moduleName;

	protected $userData;

	public function __construct(){

		// parent::__construct();
		
		$this->middleware('web');

		if (Auth::check()) {

			$this->userData = Auth::user();

			view()->share('userData', $this->userData);

        }
	}

	

	public function loadView($viewName = '', $params = array()) {
		
		$viewDir = 'admin';
		
		$moduleName = $this->moduleName ? '.' . $this->moduleName : '';
		
		$controlerName = strtolower(MyHelper::getControllerName());

		if (!empty($params)) {
			return view($viewDir . $moduleName . '.' . $controlerName . '.' . $viewName . '', $params);
		} else {
			return view($viewDir . $moduleName . '.' . $controlerName . '.' . $viewName . '');
		}

	}

	public function get(){

		return view('admin.dashboard.dashboard', ['active' => 'home']);

	}

	public function makeSelectBoxData($array = [], $feild = ''){
		
		$data = [];

		for ($i=0; $i < count($array); $i++) { 

			$data[$array[$i]['id']] = $array[$i][$feild];

		}

		if(count($data) != 0){
			
			return $data;

		}
		return $data;

	}

}