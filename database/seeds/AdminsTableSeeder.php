<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <= 5; $i++) { 
        	DB::table('admins')->insert([
        		'username' => Str::random(5),
        		'password' => Str::random(5),
        		'email' => Str::random(5).'@gmail.com',
        		'role' => 1,
        		'status' => 1,
        		'avatar' => null,
        		'phone' => '0355695777',
        		'address' => 'Hà Nội',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => null
        	]);
        }
    }
}
