<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'access_admin_dashboard']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'manage_trashed_users']);

        $user = factory('App\User')->create();

        $user->givePermissionTo(['access_admin_dashboard','manage_users', 'create_user', 'manage_trashed_users']);
    }
}
