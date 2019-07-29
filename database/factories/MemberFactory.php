<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'batch'         => $faker->randomNumber(2),
        'passing_year'  => $faker->year,
        'university_id' => '0812BPM00282',
        'email'         => $faker->email,
        'phone'         => $faker->phoneNumber,
        'address'       => $faker->address,
        'organization'  => $faker->company,
        'designation'   => 'Manager',
        'dob_day'       => $faker->dayOfMonth,
        'dob_month'     => $faker->month,
        'dob_year'      => $faker->year,
        'gender'        => 'Male',
        'blood_group'   => 'AB+'
    ];
});
