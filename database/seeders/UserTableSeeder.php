<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        //
        DB::table( 'users' )->insert( [
            //super Admin
            [
                'first_name'=>'Admin',
                'last_name'=>'admin',
                'email'=>'admin@app.com',
                'password'=>Hash::make( 12345678 ),
                'address'=>'Egypt,Damietta',
                'phone_number'=>'01099812636',
                'role'=>'superadmin',
                'status'=>'active',
                'gender'=>'male',

            ],
            //Property Owner
            [
                'first_name'=>'Property',
                'last_name'=>'Owner',
                'email'=>'owner@app.com',
                'password'=>Hash::make( 12345678 ),
                'address'=>'Egypt,Mansoura',
                'phone_number'=>'01099812434',
                'role'=>'Propertyowner',
                'status'=>'active',
                'gender'=>'male',
            ],
            //User
            [
                'first_name'=>'User',
                'last_name'=>'user',
                'email'=>'user@app.com',
                'password'=>Hash::make( 12345678 ),
                'address'=>'Egypt,Mansoura',
                'phone_number'=>'01099812535',
                'role'=>'user',
                'status'=>'active',
                'gender'=>'male',
            ]
        ] );
    }
}
