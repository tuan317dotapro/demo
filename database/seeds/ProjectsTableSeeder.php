<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('projects')->insert([
        	'project_name' => 'Ahihihihi',
        	'staff_id' => 3,
        	'address' => 'Hà Nội',        	
       		'created_at' => date('Y-m-d H:i:s'),
       		'updated_at' => null
        	]);
    }
}
