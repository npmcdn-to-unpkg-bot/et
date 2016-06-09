<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Helpers\MyHelper;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	protected $userData = array();
	protected $moduleName = ''; // Khai báo module: Để phân chia chức năng cho dễ
	
    function __construct() {
    	
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

	public function log($data, $die = false){

		echo '<pre>';

		print_r($data);

		echo '</pre>';

		if($die == true){

			die;

		}
		
		return;
	}
		
}
