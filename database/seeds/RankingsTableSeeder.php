<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RankingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('rankings')->insert([
        	'ranking_name' => 'Senior',
        	'salaries_id' => 3,
        	'status' => 1,        	
       		'created_at' => date('Y-m-d H:i:s'),
       		'updated_at' => null
        	]);
    }
}
