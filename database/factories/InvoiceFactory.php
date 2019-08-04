<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Member;
use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'member_id'     => factory(Member::class)->create(),
        'for'           => 'Registration Fee',
        'amount'        => '1000'
    ];
});
