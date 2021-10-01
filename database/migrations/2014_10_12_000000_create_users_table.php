<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('android_id')->default('text');
            $table->string('kelas')->default('text');
            $table->string('nik')->default('text');
            $table->enum('jenis_kelamin',['Laki-Laki', 'Perempuan'])->nullable()->default("Laki-Laki");
            $table->enum('status',['Aktif', 'Tidak-Aktif'])->nullable()->default('Aktif');
            $table->text('alamat');
            $table->string('no_hp_ortu')->default('text');
            $table->boolean('is_Admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
