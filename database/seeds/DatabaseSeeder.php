<?php

use App\Models\Soal;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Pengaturan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class,20)->create();
        factory(Soal::class,20)->create();
        factory(Pengaturan::class,20)->create();
        factory(Nilai::class,20)->create();
    }
}
