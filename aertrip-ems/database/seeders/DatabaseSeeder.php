<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Department as DepartmentModel;
use App\Models\Employ as EmployModel;
use App\Models\Contact;
use App\Models\Address;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DepartmentModel::create(
            [
                "id" => 1,
                "name" => "IT",
            ]
        );


        DepartmentModel::create(
            [
                "id" => 2,
                "name" => "Security",
            ]
        );


        EmployModel::create(
            [
                "id" => 1,
                "department_id" => 1,
                "name" => "Rajendra Pal Singh",
            ]
        );

        Contact::create(
            [
                "employ_id" => 1,
                "phone_no" => "9685925522",
            ]
        );

        Address::create(
            [
                "employ_id" => 1,
                "address" => "30 Siddharth Nagar",
            ]
        );


    }
}
