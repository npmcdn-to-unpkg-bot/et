<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\AdminController;

use App\Models\Admin\Admin_Question;

use App\Models\Admin\Admin_Domain;

use App\Models\Admin\Admin_Level;

use App\Models\Admin\Admin_Chapter;

use App\Models\Admin\Admin_Class;

use App\Models\Admin\Admin_Test;

class TestController extends AdminController
{
	public function __construct(){

    	parent::__construct();

    }

    public function getIndex(){

    	return $this->loadView('test');

    }

    public function getQuestion($id){
    	
    	return $this->loadView('question', [

    		'test' => (new Admin_Test)->where('id', $id)->get()[0],

    		'domains' => $this->makeSelectBoxData((new Admin_Domain)->get(), 'domain_name'),

            'levels' => $this->makeSelectBoxData((new Admin_Level)->get(), 'level_name'),

            'chapters' => $this->makeSelectBoxData((new Admin_Chapter)->get(), 'chapter_name'),
            
            'classes' => $this->makeSelectBoxData((new Admin_Class)->get(), 'class_name')
    	]);

    }

    
}
