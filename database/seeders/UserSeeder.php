<?php

namespace Database\Seeders;

use App\Enums\User\UserRoleEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            "name" => "Anastasia",
            "email" => "admin@admin.com",
            "password" => "12341234",
            "role" => UserRoleEnum::ADMIN->value
        ]);
        User::query()->create([
            "name" => "Vasya Pupkin",
            "email" => "user@admin.com",
            "password" => "12341234",
            "role" => UserRoleEnum::USER->value
        ]);
        User::query()->create([
            "name" => "Petya Vaskin",
            "email" => "user@user.com",
            "password" => "12341234",
            "role" => UserRoleEnum::USER->value
        ]);
    }
}
