<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';

    public function getInfoRoomByArrId($arrId = [])
    {
    	$data = Rooms::select('*')
    				->whereIn('id',$arrId)
    				->get();
    	if ($data) {
    		$data = $data->toArray();
    	}
    	return $data;
    }

    // one-to-many với staff
    public function staff()
    {
    	return $this->hasMany('App\Models\Staff');
    }

    public function getAllDataRooms()
    {
    	$data = Rooms::all();
    	if ($data) {
    		$data = $data->toArray();
    	}
    	return $data;
    }
    
}
