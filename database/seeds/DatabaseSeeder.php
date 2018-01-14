<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Service;
use App\Packet;
use App\Place;

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
    		"role_id"=>1,
    		"name"=>"zulham",
    		"email"=>"admin@gmail.com",
    		"password"=>bcrypt("admin"),
            "status"=>"free"
    	]);

        Service::create([
            "id"=>1,
            "service" => "Aerobic",
            "description" => "something"
        ]);

        Packet::create([
            "id"=>1,
            "service_id"=>1,
            "packet"=>"Aerobic Happy"
        ]);

        Packet::create([
            "id"=>2,
            "service_id"=>1,
            "packet"=>"Aerobic Lansia"
        ]);

        Place::create([
            "id"=>1,
            "service_id"=>1,
            "place"=>"UNNES"
        ]);

        Place::create([
            "id"=>2,
            "service_id"=>1,
            "place"=>"Rumah Saya"
        ]);

    }
}
