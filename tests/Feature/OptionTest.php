<?php

namespace Tests\Feature;

use App\Option;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OptionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */

    public function admins_can_add_options()
    {        
        //$this->withoutExceptionHandling();

        Permission::create(['name' => 'access_admin_dashboard']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'manage_members']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'manage_trashed_users']);
        Permission::create(['name' => 'manage_university_ids']);

        $user = factory('App\User')->create();

        $user->givePermissionTo(['access_admin_dashboard','manage_users','manage_members','create_user','manage_trashed_users','manage_university_ids']);

        $this->actingAs($user);

        $attributes = factory(Option::class)->raw();

        $this->post('/admin/options/', $attributes);

        $attributes['value'] = json_encode($attributes['value']);

        $this->assertDatabaseHas('options', $attributes);
    }

    /** @test */

    public function admins_can_update_options()
    {
        //$this->withoutExceptionHandling();

        Permission::create(['name' => 'access_admin_dashboard']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'manage_members']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'manage_trashed_users']);
        Permission::create(['name' => 'manage_university_ids']);

        $user = factory('App\User')->create();

        $user->givePermissionTo(['access_admin_dashboard','manage_users','manage_members','create_user','manage_trashed_users','manage_university_ids']);

        $this->actingAs($user);

        $option = factory(Option::class)->create();

        $attributes = [
            'key'   => $option->key,
            'value' => ['1', '2', '3', '4', '5']
        ];

        $this->patch('/admin/options/'.$option->id, $attributes);

        $attributes['value'] = json_encode($attributes['value']);

        $this->assertDatabaseHas('options', $attributes);
    }
}
