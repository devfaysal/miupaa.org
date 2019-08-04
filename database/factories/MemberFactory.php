<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Member;
use App\UniversityId;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'batch'         => $faker->randomNumber(2),
        'passing_year'  => date('Y'),
        'university_id' => factory(UniversityId::class)->create()->number,
        'email'         => $faker->email,
        'phone'         => '01670347708',
        'address'       => $faker->address,
        'organization'  => $faker->company,
        'designation'   => 'Manager',
        // 'dob_day'       => $faker->dayOfMonth,
        // 'dob_month'     => $faker->month,
        // 'dob_year'      => $faker->year,
        'gender'        => 'Male',
        'blood_group'   => 'AB+',
        'image'         => 'placeholder-person.png'
    ];
});
