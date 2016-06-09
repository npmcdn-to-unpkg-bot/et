<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\FrontController;

class HomeController extends FrontController {

	
	public function __construct() {
		parent::__construct();
		
	}
	
	function getIndex() {
		
		return $this->loadView('index');
	}

}
