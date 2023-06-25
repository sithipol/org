<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\Group;
use App\Models\SurveyType;
use App\Models\User;
use App\Models\UserDepartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(1)->create();
        Department::factory(10)->create();
        UserDepartment::factory(1)->create();
        Group::insert([[
            'name' => 'Administrator'
        ], [
            'name' => 'VP'
        ], [
            'name' => 'Staff'
        ]]);
        SurveyType::insert([[
            'name' => '1 ตัวเลือก',
            'status' => 1
        ], [
            'name' => 'หลายตัวเลือก',
            'status' => 1
        ], [
            'name' =>
            'พิมพ์ข้อความ',
            'status' => 1
        ]]);
    }
}
