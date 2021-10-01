<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pengaturan;
use Faker\Generator as Faker;

$factory->define(Pengaturan::class, function (Faker $faker) {
    return [
        'nama_ujian'   => $faker->name,
        'waktu'        => rand(10,40),
        'nilai_min'    => rand(10,40),
        'peraturan_ujian' => $faker->name
    ];
});

