<?php

use App\UniversityId;
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
        Permission::create(['name' => 'manage_members']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'manage_trashed_users']);
        Permission::create(['name' => 'manage_university_ids']);

        $user = factory('App\User')->create();

        $user->givePermissionTo(['access_admin_dashboard','manage_users','manage_members','create_user','manage_trashed_users','manage_university_ids']);

        for($i=200; $i<=299; $i++){
            $prefix = $i<1000 ? '00' : '0';
            //0812BPM00282
            $university_id = '0812BPM'.$prefix.$i;

            $id = new UniversityId;
            $id->number = $university_id;
            $id->save();
        }
    }
}
