<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Nilai;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Nilai::class, function (Faker $faker) {
    return [
        'id_user'   => function(){
            return User::all()->random();
        },
        'benar'      => rand(10,20),
        'salah'      => rand(10,20),
        'kosong'     => rand(10,20),
        'score'      => rand(10,20),
        'keterangan' => $faker->word,
    ];
});
