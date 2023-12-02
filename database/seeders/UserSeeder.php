<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name', 'admin')->first();

        $role_user = Role::where('name', 'user')->first();



        $admin = new User;
        $admin->name = "Anya";
        $admin->email = "admin@admin.com";
        $admin->password = "testtest";
        $admin->save();

        $admin->roles()->attach($role_admin);

        $user = new User;
        $user->name = "Jane Doe";
        $user->email = "user@user.com";
        $user->password = "testtest";
        $user->save();

        $user->roles()->attach($role_user);
    }
}
