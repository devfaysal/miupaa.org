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
        // $attributes['dob'] = $attributes['dob_year'] . '-' . $attributes['dob_month'] . '-' . $attributes['dob_day'];
        // unset($attributes['dob_day']);
        // unset($attributes['dob_month']);
        // unset($attributes['dob_year']);
        $attributes['image'] = $img;
        $this->assertDatabaseHas('members', $attributes);
    }
}
