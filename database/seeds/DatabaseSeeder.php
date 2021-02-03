<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'password' => bcrypt('12345678'),
        ]);
        $role = Role::findById(1);
        $user->assignRole([$role->id]);
        $user = User::create([
            'email' => 'guest@gmail.com',
            'name' => 'Guest',
            'password' => bcrypt('12345678'),
        ]);
        $role = Role::findById(2);
        $user->assignRole([$role->id]);
    }
}
