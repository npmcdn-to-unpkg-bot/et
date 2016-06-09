<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\ChapterRequest;
use App\Models\Admin\Admin_Chapter;
use Illuminate\Http\Request;

class ChapterController extends AdminController
{

    public function __construct()
    {
        parent::__construct();

        view()->share('active', 'chapter');

    }

    public function getIndex()
    {

        return $this->loadView('chapter');

    }

    public function getCreate()
    {

        return $this->loadView('create', [
            'submit' => 'Thêm',
            'action' => 'create',
        ]);

    }

    public function postCreate(ChapterRequest $request)
    {

        $arr = $request->input();

        unset($arr['_token']);

        unset($arr['chapter_name_old']);

        (new Admin_Chapter)->insert($arr);

        return redirect(url('admin/chapter'));
    }

    public function getUpdate($id)
    {

        $data = (new Admin_Chapter)->where('id', $id)->get()[0];

        return $this->loadView('create', [
            'submit' => 'Sửa',
            'action' => 'update',
            'data'   => $data,
        ]);

    }

    public function postUpdate(Request $request, $id)
    {

        $arr = $request->input();

        unset($arr['_token']);

        if ($arr['chapter_name_old'] != $arr['chapter_name']) {

            if (count((new Admin_Chapter)->where('chapter_name', $arr['chapter_name'])->get()) > 0) {

                $data = (new Admin_Chapter)->where('id', $id)->get()[0];

                return $this->loadView('create', ['submit' => 'Sửa', 'action' => 'update', 'data' => $data, 'errunique' => $arr['chapter_name'] . ' đã tồn tại']);

            } else {

                unset($arr['chapter_name_old']);

                (new Admin_Chapter)->where('id', $id)->update($arr);

                return redirect(url('admin/chapter'));

            }

        } else {
            unset($arr['chapter_name_old']);
        }

        (new Admin_Chapter)->where('id', $id)->update($arr);

        return redirect(url('admin/chapter'));

    }

    public function getDelete(Request $request)
    {

        if ($request->id) {
            (new Admin_Chapter)->where('id', $request->id)->update([
                'delete_flg' => 1,
            ]);
        }

        if ($request->array) {
            $arr = explode(',', $request->array);

            foreach ($arr as $key) {
                (new Admin_Chapter)->where('id', $key)->update([
                    'delete_flg' => 1,
                ]);
            }
        }
        return redirect(url('admin/chapter'));

    }
}
