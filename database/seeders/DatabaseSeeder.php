<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\list_users;
use App\Models\management;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        management::factory(4)->create();
        User::factory(6)->create();
        list_users::factory(6)->create();
    }
}
