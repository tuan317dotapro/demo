<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
	protected $table = 'salaries';

	// one-to-one với rankings
	public function rankings()
	{
		return $this->hasOne('App\Models\Rankings');
	}

	public function getAllDataSalaries()
	{
		$data = Salaries::all();
		if ($data) {
			$data = $data->toArray();
		}
		return $data;
	}
}
