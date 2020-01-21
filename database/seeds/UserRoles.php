<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'default']);
        Role::create(['name' => 'admin']);
    }
}
