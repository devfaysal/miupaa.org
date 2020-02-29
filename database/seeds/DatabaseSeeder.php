<?php

use App\Option;
use App\UniversityId;
use Illuminate\Database\Seeder;
use Devfaysal\LaravelAdmin\Models\Admin;
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
        $this->call(LaravelAdminSeeder::class);

        Permission::create(['guard_name'=>'admin', 'name' => 'manage_university_ids']);
        Permission::create(['guard_name'=>'admin', 'name' => 'manage_options']);
        Permission::create(['guard_name'=>'admin', 'name' => 'manage_members']);

        $admin = Admin::first();

        $admin->givePermissionTo(['manage_university_ids','manage_options','manage_members']);

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
