<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstRole = new Role();
        $secondRole = new Role();

        $firstRole->name = Role::ROLE_STANDART;
        $secondRole->name = Role::ROLE_EDITOR;

        $firstRole->save();
        $secondRole->save();
    }
}
