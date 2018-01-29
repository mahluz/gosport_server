<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Service;
use App\Packet;
use App\Place;
use App\Biodata;

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
        	"role"=>"customer"
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

        User::create([
            "id"=>2,
            "role_id"=>3,
            "name"=>"ardian",
            "email"=>"ardian@gmail.com",
            "password"=>bcrypt("ardian"),
            "status"=>"free"
        ]);

        Biodata::create([
            "user_id"=>1,
            "full_name"=>"Zulham Azwar Achmad",
            "cp"=>"089682169754",
            "birth_date"=>"1995-12-12",
            "gender"=>"Laki-laki",
            "last_education"=>"S1 Universitas Negeri Semarang",
            "profession"=>"Founder and CTO Ardata media",
            "skill"=>"Software Engineer and Marketing"
        ]);

        Biodata::create([
            "user_id"=>2,
            "full_name"=>"Ardian Rizki",
            "cp"=>"08971236512",
            "birth_date"=>"1995-19-1",
            "gender"=>"Laki-laki",
            "last_education"=>"S1 Universitas Negeri Semarang",
            "profession"=>"Founder and CEO Ardata media",
            "skill"=>"Marketing"
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
