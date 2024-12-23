<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@user.com',
            'password'=> bcrypt('123456'),
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password'=> bcrypt('123456'),
            'is_admin'=>1
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);

        $admin_role = Role::create(['name'=>'admin']);
        $user_role = Role::create(['name'=>'user']);

        $user->assignRole($user_role);
        $admin->assignRole($admin_role);
    }
}
