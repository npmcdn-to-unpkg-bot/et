<?php

namespace App\Http\Controllers\Front\Test;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\Front\Front_Question;

use App\Models\Front\Front_Answer;

use App\Models\Front\Front_Test;

class TestController extends Controller
{

    public function index(){

    	return view('front.test.test', [

            'test' => (new Front_Test)->get()[0],

    		'questions' => (new Front_Question)->get(),

    		'answers' => (new Front_Answer)->get()

    	]);
    }

    public function start(){

    	session()->push('status', 'started');

    }

    public function end(Request $request){

    	$examp = $request->input();

    	$score = $this->exec($examp);

    	return $score;

    }

    public function exec($examp = []){

    	$score = 0;

    	foreach ($examp as $q => $e) {

    		$right = 0;

    		if((new Front_Answer)->where('questions_id', $q)->where('answer_isright', 1)->count() != count($e)){

    			$right = 0;

    		}

    		else{

    			foreach($e as $i){

	    			if((new Front_Answer)->where('id', $i)->get()[0]['answer_isright'] == 1){

		    			$right = 1;

		    		}else{

		    			$right = 0;

		    		}

	    		}

    		}
    		
    		if($right == 1){

    			$score ++;

    		}
    		
    	}

    	return $score;

    }

}
