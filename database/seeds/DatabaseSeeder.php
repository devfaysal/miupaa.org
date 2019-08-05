<?php

use App\Option;
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
        Permission::create(['name' => 'manage_options']);

        $user = factory('App\User')->create();

        $user->givePermissionTo(['access_admin_dashboard','manage_users','manage_members','create_user','manage_trashed_users','manage_university_ids','manage_options']);

        //University ID
        for($i=200; $i<=299; $i++){
            $prefix = $i<1000 ? '00' : '0';
            //0812BPM00282
            $university_id = '0812BPM'.$prefix.$i;

            $id = new UniversityId;
            $id->number = $university_id;
            $id->save();
        }

        //Batches
        $option = new Option;
        $option->key = 'batches';
        $option->value = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '9 S', '10', '11', '12', '13', '14'];
        $option->save();

    }
}
