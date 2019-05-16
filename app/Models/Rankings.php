<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rankings extends Model
{
    protected $table = 'rankings';

        public function getInfoRankingByArrId($arrId = [])
    {
        $data = Rankings::select('*')
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
    
    // one-to-one với salaries
    public function salaries()
    {
    	return $this->belongsTo('App\Models\Salaries');
    }

    public function getAllDataRankings()
    {
        $data = Rankings::all();
        if ($data) {
            $data = $data->toArray();
        }
        return $data;
    }
}
