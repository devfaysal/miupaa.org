<?php

namespace Tests\Feature;

use App\Member;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MemberTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    /** @test */

    public function visitor_can_be_registered_as_member()
    {
        $this->withoutExceptionHandling();

        $attributes = factory(Member::class)->raw();

        foreach($attributes as $key => $value){
            $this->get('/members/registration')
                ->assertSee($key);
        }
        $img = time().'.jpg';
        $attributes['image'] = UploadedFile::fake()->image($img);
        $this->post('/members', $attributes);

        $attributes['image'] = $img;
        $this->assertDatabaseHas('members', $attributes);
        $member = Member::first();
        $this->assertDatabaseHas('invoices', ['member_id' =>$member->id]);
    }

    /** @test */

    public function member_has_many_invoices()
    {
        
    }

}
