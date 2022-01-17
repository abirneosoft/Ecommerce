<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class myseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'first_name' =>'Admin' , 'last_name' => 'admin','email'=>'abir.das@neosoftmail.com','password'=>Hash::make('admin123'),'status'=>'active','r_id'=>'1'
            
        ]);
    }
}
