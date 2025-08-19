<?php

namespace Database\Seeders;
use App\Models\Group;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
{
    Group::create(['name' => 'Administrator']);
    Group::create(['name' => 'Member']);
}
}
