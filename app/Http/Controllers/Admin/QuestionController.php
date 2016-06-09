<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\QuestionRequest;
use App\Models\Admin\Admin_Answer;
use App\Models\Admin\Admin_Chapter;
use App\Models\Admin\Admin_Class;
use App\Models\Admin\Admin_Domain;
use App\Models\Admin\Admin_Level;
use App\Models\Admin\Admin_Question;
use Illuminate\Http\Request;

class QuestionController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        view()->share('active', 'question');
    }

    public function getIndex()
    {
        return $this->loadView('question', [
            'domains'  => $this->makeSelectBoxData((new Admin_Domain)->where('delete_flg', 0)->get(), 'domain_name'),
            'levels'   => $this->makeSelectBoxData((new Admin_Level)->where('delete_flg', 0)->get(), 'level_name'),
            'chapters' => $this->makeSelectBoxData((new Admin_Chapter)->where('delete_flg', 0)->get(), 'chapter_name'),
            'classes'  => $this->makeSelectBoxData((new Admin_Class)->where('delete_flg', 0)->get(), 'class_name'),
        ]);
    }

    public function getCreate()
    {
        return $this->loadView('create', [
            'action'   => 'create',
            'submit'   => 'Thêm',
            'domains'  => $this->makeSelectBoxData((new Admin_Domain)->where('delete_flg', 0)->get(), 'domain_name'),
            'levels'   => $this->makeSelectBoxData((new Admin_Level)->where('delete_flg', 0)->get(), 'level_name'),
            'chapters' => $this->makeSelectBoxData((new Admin_Chapter)->where('delete_flg', 0)->get(), 'chapter_name'),
            'classes'  => $this->makeSelectBoxData((new Admin_Class)->where('delete_flg', 0)->get(), 'class_name'),
        ]);
    }

    public function postCreate(QuestionRequest $request)
    {
        $arr = $request->input();
        unset($arr['_token']);
        if ($request->input('test')) {
            unset($arr['test']);
        }
        unset($arr['question_description_old']);
        (new Admin_Question)->insert($arr);
        return redirect(url('admin/question'));
    }

    public function getUpdate($id)
    {
        $data = (new Admin_Question)->where('id', $id)->get()[0];
        return $this->loadView('create', [
            'data'     => $data,
            'action'   => 'update',
            'submit'   => 'Sửa',
            'domains'  => $this->makeSelectBoxData((new Admin_Domain)->where('delete_flg', 0)->get(), 'domain_name'),
            'levels'   => $this->makeSelectBoxData((new Admin_Level)->where('delete_flg', 0)->get(), 'level_name'),
            'chapters' => $this->makeSelectBoxData((new Admin_Chapter)->where('delete_flg', 0)->get(), 'chapter_name'),
            'classes'  => $this->makeSelectBoxData((new Admin_Class)->where('delete_flg', 0)->get(), 'class_name'),
        ]);
    }

    public function postUpdate(Request $request, $id)
    {
        $arr = $request->input();
        unset($arr['_token']);
        if ($arr['question_description_old'] != $arr['question_description']) {
            if (count((new Admin_Question)->where('question_description', $arr['question_description'])->get()) > 0) {
                $data = (new Admin_Question)->where('id', $id)->get()[0];
                return $this->loadView('create', ['submit' => 'Sửa', 'action' => 'update', 'data' => $data,
                    'domains'                                  => $this->makeSelectBoxData((new Admin_Domain)->where('delete_flg', 0)->get(), 'domain_name'),
                    'levels'                                   => $this->makeSelectBoxData((new Admin_Level)->where('delete_flg', 0)->get(), 'level_name'),
                    'chapters'                                 => $this->makeSelectBoxData((new Admin_Chapter)->where('delete_flg', 0)->get(), 'chapter_name'),
                    'classes'                                  => $this->makeSelectBoxData((new Admin_Class)->where('delete_flg', 0)->get(), 'class_name'),
                    'errunique'                                => 'Câu hỏi này đã tồn tại']);
            } else {
                unset($arr['question_description_old']);
                (new Admin_Question)->where('id', $id)->update($arr);
                return redirect(url('admin/question'));
            }
        } else {
            unset($arr['question_description_old']);
        }
        (new Admin_Question)->where('id', $id)->update($arr);
        return redirect(url('admin/question'));
    }

    public function getDelete(Request $request)
    {
        if ($request->id) {
            (new Admin_Question)->where('id', $request->id)->update([
                'delete_flg' => 1,
            ]);
            (new Admin_Answer)->where('questions_id', $request->id)->update([
                'delete_flg' => 1,
            ]);
        }

        if ($request->array) {
            $arr = explode(',', $request->array);

            foreach ($arr as $key) {
                (new Admin_Question)->where('id', $key)->update([
                    'delete_flg' => 1,
                ]);
                (new Admin_Answer)->where('questions_id', $key)->update([
                    'delete_flg' => 1,
                ]);
            }
        }

        return redirect(url('admin/question'));
    }

    public function getAnswer($id)
    {
        $data = (new Admin_Question)->where('id', $id)->get()[0];
        return $this->loadView('answer', ['data' => $data, 'action' => 'create-answer', 'submit' => 'Thêm']);
    }

}
