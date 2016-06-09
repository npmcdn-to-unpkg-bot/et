<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\AdminController;

use App\Models\Admin\Admin_Domain;

use App\Models\Admin\Admin_Question;

use App\Http\Requests\DomainRequest;


class DomainController extends AdminController
{

    public function __construct() {

        parent::__construct();
        
    }

    public function getIndex(){

        return $this->loadView('domain');

    }

    public function getCreate(){
        return $this->loadView('create',['action' => 'create', 'submit' => 'Thêm']);
    }

    public function postCreate(DomainRequest $request){

        $arr = $request->input();

        unset($arr['_token']);

         unset($arr['domain_name_old']);

        (new Admin_Domain)->insert($arr);

        return redirect(url('admin/domain'));

    }


    public function getUpdate($id){

        $data = (new Admin_Domain)->where('id', $id)->get()[0];

        return $this->loadView('create', ['data' => $data, 'action' => 'update', 'submit' => 'Sửa']);

    }

    public function postUpdate(Request $request,$id){

         $arr = $request->input();

        unset($arr['_token']);
      
        if($arr['domain_name_old'] != $arr['domain_name']){

            if(count((new Admin_Domain)->where('domain_name',$arr['domain_name'])->get())>0){
                
                $data = (new Admin_Domain)->where('id',$id)->get()[0];

                return $this->loadView('create',['submit'=>'Sửa','action'=>'update','data'=>$data,'errunique'=>'Lĩnh vực "'.$arr['domain_name'].'" đã tồn tại']);
            }else{

                unset($arr['domain_name_old']);

                (new Admin_Domain)->where('id',$id)->update($arr);

                return redirect(url('admin/domain'));

            }


        }else

            unset($arr['domain_name_old']);

            (new Admin_Domain)->where('id',$id)->update($arr);

            return redirect(url('admin/domain'));


    }

    public function getDelete($id){

            (new Admin_Domain)->where('id', $id)->update([
                'delete_flg' => 1
            ]);
            return redirect(url('admin/domain'));
    }        

}
