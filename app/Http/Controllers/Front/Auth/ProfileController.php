<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\FrontController;
use App\Models\Front\Front_User;
use App\Models\Front\Front_Class;
use Validator;
use Illuminate\Support\Facades\Input;

use Session;

class ProfileController extends FrontController {

	
	protected $moduleName = 'auth';
	
	public function __construct() {
		parent::__construct();
		
	}
	
	function getIndex() {
		$user = $this->userData;
		$classes = Front_Class::all();
		
		$classIds = ['' => trans('text.select_class')];
		if ($classes) {
			foreach ($classes as $row) {
				$classIds[$row->id] = $row->class_name;
			}
		}
		
		return $this->loadView('index', ['user' => $user, 'classIds' => $classIds]);
	}
	
	function patchIndex() {
		$Input = new Input;
		$inputAll = $Input::all();
		
		$inputAll['birth_date'] = '';
		if (!empty($inputAll['year']) && !empty($inputAll['month']) && !empty($inputAll['day'])) {
			$inputAll['birth_date'] = $inputAll['year'].'-'.$inputAll['month'].'-'.$inputAll['day'];
		}
		
		$inClass = $this->_getInListClasses();
		
		$v = Validator::make($inputAll, [
			'firstname' => 'required|max:255',
			'lastname' => 'required|max:255',
			'classes_id' => 'required'.$inClass,
			'birt_date' => 'date',
		]);
		
		if ($v->fails()) {
			return redirect('profile/index')->withErrors($v);
		}
		
		$datas = array(
			'firstname' => $Input::get('firstname'),
			'lastname' => $Input::get('lastname'),
			'classes_id' => $Input::get('classes_id'),
			'middlename' => $Input::get('middlename', ''),
			'school_name' => $Input::get('school_name', ''),
			'birth_date' => $inputAll['birth_date'],
		);
		
		Front_User::where('user_id', $this->userData->user_id)
			->update($datas);
		
		Session::flash('successMsg', trans('message.data_saved'));
		return redirect('profile/index');
	}

	protected function _getInListClasses() {
		$classes = Front_Class::all();
		if ($classes) {
			$classIds = array();
			foreach ($classes as $row) {
				$classIds[] = $row['id'];
			}
			return '|in:'.implode(',', $classIds);
		}
		return '';
	}
}