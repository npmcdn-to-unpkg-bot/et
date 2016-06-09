<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\UserRequest;
use App\Models\Admin\Admin_Class;
use App\Models\Admin\Admin_User;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    // public function get(){
    //     return 'user in admin';
    // }

    public function __construct()
    {

        parent::__construct();

    }

    public function getIndex()
    {

        return $this->loadView('user');

    }

    public function getCreate()
    {
        return $this->loadView('create', [
            'action'  => 'create',

            'submit'  => 'Thêm',

            'classes' => $this->makeSelectBoxData((new Admin_Class)->where('delete_flg', 0)->get(), 'class_name')]);
    }
    public function postCreate(UserRequest $request)
    {
        $arr = $request->input();

        $this->CreateUpdate($arr, 'insert');

        return redirect(url('admin/user'));

    }

    public function getUpdate($id)
    {
        $data = (new Admin_User)->where('id', $id)->get()[0];
        $err  = [];
        return $this->loadView('create', $this->setUpdate($data, $err));
    }

    public function postUpdate(Request $request, $id)
    {

        $arr = $request->input();

        $data = (new Admin_User)->where('id', $id)->get()[0];

        if ($arr['user_name_old'] != $arr['user_name']) {
            if (count((new Admin_User)->where('user_name', $arr['user_name'])->get()) > 0) {

                $err = [
                    'user_name'  => 'Tên vừa nhập đã tồn tại',
                    'user_email' => '',
                ];
                return $this->loadView('create', $this->setUpdate($data, $err));
            } else {

                $this->CreateUpdate($arr, 'update');

                return redirect(url('admin/user'));

            }

        } elseif ($arr['user_email_old'] != $arr['user_email']) {

            if (count((new Admin_User)->where('user_email', $arr['user_email'])->get()) > 0) {
                $err = [
                    'user_name'  => '',
                    'user_email' => 'Email vừa nhập đã tồn tại',
                ];
                return $this->loadView('create', $this->setUpdate($data, $err));
            } elseif (filter_var($arr['user_email'], FILTER_VALIDATE_EMAIL) === false) {
                $err = [
                    'user_name'  => '',
                    'user_email' => 'Email bạn vừa nhập không đúng định dạng',
                ];
                return $this->loadView('create', $this->setUpdate($data, $err));
            } else {
                $this->CreateUpdate($arr, 'update');
                return redirect(url('admin/user'));
            }

        } else {
            $this->CreateUpdate($arr, 'update');
        }

        return redirect(url('admin/user'));

    }

    public function getDelete($id)
    {
        (new Admin_User)->where('id', $id)->update([
            'delete_flg' => 1,
        ]);
        return redirect(url('admin/user'));
    }

    public function getLock($id){
        (new Admin_User)->where('id', $id)->update([
            'is_allow_login' => 1,
        ]);
        return redirect(url('admin/user'));
    }

    public function setUpdate($data, $err)
    {
        $update = [
            'action'  => 'update',
            'data'    => $data,
            'submit'  => 'Sửa',
            'err'     => $err,
            'classes' => $this->makeSelectBoxData((new Admin_Class)->where('delete_flg', 0)->get(), 'class_name'),
        ];
        return $update;
    }

    public function CreateUpdate($arr, $action = '')
    {

        unset($arr['_token']);
        unset($arr['user_name_old']);
        unset($arr['user_email_old']);
        if ($action == 'insert') {
            (new Admin_User)->$action($arr);
        } else {
            (new Admin_User)->where('id', $arr['id'])->$action($arr);
        }

    }

}
