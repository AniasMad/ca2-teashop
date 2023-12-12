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

        $role_mod = Role::where('name', 'moderator')->first();

        $role_user = Role::where('name', 'user')->first();



        $admin = new User;
        $admin->name = "Anya";
        $admin->email = "admin@admin.com";
        $admin->password = "testtest";
        $admin->save();

        $admin->roles()->attach($role_admin);

        $mod = new User; // moderator can only edit, but not delete or create any entity
        $mod->name = "Mod Doe";
        $mod->email = "mod@mod.com"; 
        $mod->password = "testtest";
        $mod->save();

        $mod->roles()->attach($role_mod);

        $user = new User;
        $user->name = "Jane Doe";
        $user->email = "user@user.com";
        $user->password = "testtest";
        $user->save();

        $user->roles()->attach($role_user);
    }
}
