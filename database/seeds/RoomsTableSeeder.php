<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <= 5; $i++) {
    		DB::table('rooms')->insert([
    			'room_name' => Str::random(7),
    			'boss' => Str::random(10) ,
    			'status' => 1,        	
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => null
    		]);
    	}
    }
}
