<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class MyHelper {

	public static function getControllerName() {
		$route = Route::current();
		$action = $route->getAction();
		
		$controller = class_basename($action['controller']);
		
        list($controller, $action) = explode('@', $controller);
		
		if (isset($controller) && $controller != '') {
			return str_replace("Controller", "", $controller);
		}
		
		return null;
	}

}
