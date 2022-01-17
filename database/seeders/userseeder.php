<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'role_id' => 1, 'role_name' => 'superadmin',
            
        ]);
        DB::table('roles')->insert([
            'role_id' => 2, 'role_name' => 'admin',
            
        ]);
        DB::table('roles')->insert([
            'role_id' => 3, 'role_name' => 'inventory manager',  
            
        ]);
        DB::table('roles')->insert([
            'role_id' => 4, 'role_name' => 'order manager',  
            
        ]);
        DB::table('roles')->insert([
         'role_id'=>5,'role_name'=>'Customer'
        ]);
        
    }
}
