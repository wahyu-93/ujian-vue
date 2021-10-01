<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Soal;
use Faker\Generator as Faker;

$factory->define(Soal::class, function (Faker $faker) {
    return [
        'soal'      => $faker->name,
        'jawaban_a' => $faker->name,
        'jawaban_b' => $faker->name,
        'jawaban_c' => $faker->name,
        'jawaban_d' => $faker->name,
        'kunci_jawaban' => 'b',
        'status'    => 'Aktif'
    ];
});
