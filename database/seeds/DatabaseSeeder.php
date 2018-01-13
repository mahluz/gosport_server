<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Role::create([
        	"id"=>1,
        	"role"=>"admin"
        ]);

        Role::create([
        	"id"=>2,
        	"role"=>"client"
        ]);

        Role::create([
        	"id"=>3,
        	"role"=>"technician"
        ]);

    	User::create([
    		"id"=>1,
    		"role_id"=>2,
    		"name"=>"zulham",
    		"email"=>"asegaf@ymail.com",
    		"password"=>bcrypt("zulhamganteng")
    	]);

    }
}
