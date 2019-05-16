<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admins extends Model
{
	// làm việc với "admins" table trong phpmyAdmin
    protected $table = 'admins';

    public static function getAllDataAdmins()
    {
    	$data = Admins::all();
    	// get() - querybuilder
    	// all()) - ORM
    	if ($data) {
    		// trước khi chuyển về Array hãy kiểm tra xem nó có rỗng không?
    		$data = $data->toArray(); // chỉ trả về DỮ LIỆU KIỂU MẢNG
    	} else {
    		$data = [];
    	}
    	return $data;
    }

    public function getDataAdminById($id)
    {
    	/*
    	DB::table(admins)
    		->where('id',$id)
    		->first();
    	*/

    	$info = Admins::find($id);
    	return $info;
    }

    public function getDataAdminByConditions($keyword = null)
    {
    	$data = [];
    	$query = Admins::select('id','username','email')
    					->where('username','like','%'.$keyword.'%')
    					->orWhere('email','like','%'.$keyword.'%')
    					->get();
    	if ($query) {
    		$data = $query->toArray();
    	}
    	return $data;

    }

    public function checkAdminLogin($user, $pass)
    {
        $data = [];
        $query = Admins::select('*')
                        ->where('username',$user)
                        ->where('password',$pass)
                        ->where('role',-1) // quy ước chỉ có "role = -1" mới login được quyền admin
                        ->where('status',1)
                        ->first();
        if ($query) {
            $data = $query->toArray();
        }
        return $data;
    }
}


