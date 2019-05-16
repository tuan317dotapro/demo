<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';

    public function getInfoProjectByArrId($arrId = [])
    {
    	$data = Projects::select('*')
    					->whereIn('id',$arrId)
    					->get();
    	if ($data) {
    		$data = $data->toArray();
    	}
    	return $data;
    }

    // many-to-many với staff
    public function staff()
    {
    	return $this->belongsToMany('App\Models\Staff');
    }

    public function getAllDataProjects()
    {
    	$data = Projects::all();
    	if ($data) {
    		$data = $data->toArray();
    	}
    	return $data;
    }
}
