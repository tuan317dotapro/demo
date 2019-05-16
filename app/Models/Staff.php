<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    protected $table = 'staff';

    // one-to-many với rooms
    public function rooms()
    {
    	return $this->belongsTo('App\Models\Rooms');
    }

    // one-to-many với rankings
    public function rankings()
    {
    	return $this->belongsTo('App\Models\Rankings');
    }

    // many-to-many với projects
    public function projects()
    {
    	return $this->belongsToMany('App\Models\Projects');
    }

    public function addDataStaff($data)
    {
        if (DB::table('staff')->insert($data)) {
            return true;
        }
        return false;
    }

    public function getAllDataStaff($keyword = '')
    {
        $data = Staff::select('staff.*','rooms.room_name')
                        ->join('rooms','rooms.id','=','staff.rooms_id')
                        ->where('staff.name_staff','LIKE','%'.$keyword.'%')
                        ->orwhere('staff.phone','LIKE','%'.$keyword.'%')
                        ->paginate(2);
        return $data;
    }

    public function deleteStaffById($id)
    {
        $del = DB::table('staff')
                    ->where('id',$id)
                    ->delete();
        return $del;
    }


    public function getInfoDataStaffById($id)
    {
        $data = Staff::find($id);
        if ($data) {
            $data = $data->toArray();
        }
        return $data;
    }

    public function updateDataStaffById($data, $id)
    {
        $up = DB::table('staff')
                ->where('id',$id)
                ->update($data);
        return $up;
    }
}
