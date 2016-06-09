<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Helpers\MyHelper;

class FrontController extends Controller
{
	protected $userData = array();
	protected $moduleName = ''; // Khai báo module: Để phân chia chức năng cho dễ
	
    function __construct() {
		parent::__construct();
		
		$this->middleware('web'); // how can call this. It's not called!
		
		if (Auth::check()) {
            // Auth::user() returns an instance of the authenticated user...
			$this->userData = Auth::user();
			//echo '<pre>';
			//print_r($this->userData);
			//print_r($this->userData->email);
			view()->share('userData', $this->userData);
        }
		
	}
	
	public function loadView($viewName = '', $params = array()) {
		$viewDir = 'front';
		$moduleName = $this->moduleName ? '.' . $this->moduleName : '';
		
		$controlerName = strtolower(MyHelper::getControllerName());
		
		if (!empty($params)) {
			return view($viewDir . $moduleName . '.' . $controlerName . '.' . $viewName . '', $params);
		} else {
			return view($viewDir . $moduleName . '.' . $controlerName . '.' . $viewName . '');
		}
	}
	
}
