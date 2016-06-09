<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Admin\Admin_Answer;
use App\Models\Admin\Admin_Chapter;
use App\Models\Admin\Admin_Class;
use App\Models\Admin\Admin_Domain;
use App\Models\Admin\Admin_Level;
use App\Models\Admin\Admin_Question;
use App\Models\Admin\Admin_Test;
use App\Models\Admin\Admin_User;
use Illuminate\Http\Request;
use Input;

class ApiController extends AdminController
{
    public function __construct()
    {

    }

    public function getUser(Request $request)
    {
        return response()->json([
            "draw"            => $request->draw,
            "recordsTotal"    => (new Admin_User())->where('user_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "recordsFiltered" => (new Admin_User())->where('user_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "data"            => (new Admin_User())->where('delete_flg', 0)->skip($request->start)->take($request->length)->get(),
        ]);
    }

    public function getDomain(Request $request)
    {
        return response()->json([
            "draw"            => $request->draw,
            "recordsTotal"    => (new Admin_Domain())->where('domain_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "recordsFiltered" => (new Admin_Domain())->where('domain_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "data"            => (new Admin_Domain())->where('delete_flg', 0)->skip($request->start)->take($request->length)->get(),
        ]);
    }

    public function getQuestion(Request $request)
    {
        $question = new Admin_Question;
        $question = new Admin_Question;
        $class    = $level    = $chapter    = $domain    = ['>', 0];
        if ($request->domain) {
            $domain[0] = '=';
            $domain[1] = $request->domain;
        }
        if ($request->class) {
            $class[0] = '=';
            $class[1] = $request->class;
        }
        if ($request->chapter) {
            $chapter[0] = '=';
            $chapter[1] = $request->chapter;
        }
        if ($request->level) {
            $level[0] = '=';
            $level[1] = $request->level;
        }
        $data = $question
            ->where('domains_id', $domain[0], $domain[1])
            ->where('chapters_id', $chapter[0], $chapter[1])
            ->where('levels_id', $level[0], $level[1])
            ->where('classes_id', $class[0], $class[1])
            ->where('question_description', 'LIKE', '%' . $request->name . '%')
            ->where('delete_flg', 0)
            ->skip($request->start)
            ->take($request->length);
        return response()->json([
            'draw'            => $request->draw,
            'recordsTotal'    => $data->count(),
            'recordsFiltered' => $data->count(),
            'data'            => $data->get(),
        ]);
    }

    public function getClass(Request $request)
    {
        return response()->json([
            "draw"            => $request->draw,
            "recordsTotal"    => (new Admin_Class())->where('class_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "recordsFiltered" => (new Admin_Class())->where('class_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "data"            => (new Admin_Class())->where('delete_flg', 0)->skip($request->start)->take($request->length)->get(),
        ]);
    }

    public function getChapter(Request $request)
    {
        return response()->json([
            "draw"            => $request->draw,
            "recordsTotal"    => (new Admin_Chapter())->where('chapter_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "recordsFiltered" => (new Admin_Chapter())->where('chapter_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "data"            => (new Admin_Chapter())->where('delete_flg', 0)->get(),
        ]);
    }

    public function getLevel(Request $request)
    {
        return response()->json([
            "draw"            => $request->draw,
            "recordsTotal"    => (new Admin_Level())->where('level_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "recordsFiltered" => (new Admin_Level())->where('level_name', 'LIKE', '%' . $request->search["value"] . '%')->count(),
            "data"            => (new Admin_Level())->skip($request->start)->where('delete_flg', 0)->take($request->length)->get(),
        ]);
    }

    public function createAnswer(Request $request)
    {
        $arr = $request->input();
        unset($arr['_token']);
        (new Admin_Answer)->insert($arr);
    }

    public function deleteAnswer($id)
    {
        (new Admin_Answer)->where('id', $id)->update([
            'delete_flg' => 1,
        ]);
    }

    public function getAnswer(Request $request)
    {
        if ($request->id) {
            $data = (new Admin_Answer)->where('id', $request->id)->get();
        }
        if ($request->question) {
            $data = (new Admin_Answer)->where('questions_id', $request->question)->where('delete_flg', 0)->get();
        }
        return response()->json([
            "data" => $data,
        ]);
    }

    public function updateAnswer(Request $request, $id)
    {
        $arr = $request->input();
        unset($arr['_token']);
        (new Admin_Answer)->where('id', $id)->update($arr);
    }

    public function getTest(Request $request)
    {
        if ($request->id) {
            $data = (new Admin_Test)->where('id', $request->id)->get()[0];
        }
        $data = (new Admin_Test)->get();
        return response()->json([
            "data" => $data,
        ]);
    }

    public function addQuestionToTest(Request $request)
    {
        $test = (new Admin_Test)->where('id', $request->input('test_id'));
        if ($test->get()[0]->test_parameters != '') {
            $arr = json_decode($test->get()[0]->test_parameters);
        } else {
            $arr = [];
        }
        $data  = [];
        $isset = 0;
        foreach ($arr as $key) {
            if ($key->questions_id != $request->input('question_id')) {
                array_push($data, $key);
            } else {
                $isset = 1;
            }
        }
        if ($isset == 1) {
            $test->update([
                "test_parameters" => json_encode($data),
            ]);
            return response()->json($data);
        }
        $question = (new Admin_Question)->where('id', $request->input('question_id'))->get()[0];
        array_push($arr, [
            "questions_id" => $question->id,
            "chapters_id"  => $question->chapters_id,
            "classes_id"   => $question->classes_id,
            "domains_id"   => $question->domains_id,
            "levels_id"    => $question->levels_id,
        ]);
        $test->update([
            "test_parameters" => json_encode($arr),
        ]);
        return response()->json($arr);
    }

    public function checkDelete($id, $check)
    {
        if ((new Admin_Question)->where($check, $id)->where('delete_flg', 0)->get()->count() > 0) {
            return "false";
        } else {
            return "true";
        }
    }

    public function upload(Request $request){
        return response()->json($request->file());
    }
}
