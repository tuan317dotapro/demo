<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$strIdRoom = json_encode([])

    	DB::table('staff')->insert([
        	'name_staff' => 'Nguyễn Tiến Huy',
            'rooms_id' => 1,
            'rankings_id' => 1,
            'projects_id' => 1, 
        	'birth' => '1998/08/14',
        	'gender' => 1,
        	'address' => 'Hà Nội',
        	'email' => 'huyart@gmail.com',
        	'phone' => '0909394255',       	
        	'status' => 1,
        	'created_at' => date('Y-m-d H:i:s'),
       		'updated_at' => null
        ]);
    }
}
