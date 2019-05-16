<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <= 5; $i++) {
	    	DB::table('salaries')->insert([
	        	'level' => $i,
	        	'money' => 120000,
	        	'status' => 1,
	       		'created_at' => date('Y-m-d H:i:s'),
	       		'updated_at' => null
	        	]);
	    }
    }
}
