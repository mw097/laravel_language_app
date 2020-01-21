<?php

use Illuminate\Database\Seeder;
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
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        Role::create(['name' => 'default']);
        /** @var \App\User $user */
        $user = factory(\App\User::class)->create();

        $user->assignRole('default');
        Role::create(['name' => 'admin']);
        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'password' => '$2y$10$W2dIxrPJYmopCl4mW3vWGenJGUIqjP0BL2e42tVMLsXAn37Y3Fuuq'
        ]);

        $admin->assignRole('admin');
    }
}
