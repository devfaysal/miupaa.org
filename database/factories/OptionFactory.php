<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Option;
use Faker\Generator as Faker;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'key'       => 'batches',
        'value'     => ['1', '2', '3']
    ];
});
