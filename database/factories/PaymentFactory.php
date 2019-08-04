<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Invoice;
use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'invoice_id'        => factory(Invoice::class)->create(),
        'date'              => date('Y-m-d'),
        'method'            => 'cash',
        'reference'         => $faker->sentence,
        'received_by_id'    => factory(User::class)->create()
    ];
});
