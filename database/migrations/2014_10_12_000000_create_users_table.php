<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('adresse')->nullable();
            $table->string('password')->nullable();
            $table->integer('level')->nullable();//-1:a ne pas afficher; O:bloquer ;1:activer
            $table->rememberToken();
            $table->timestamps();
        });

        \App\Models\User::create([
            'nom'=>'admin',
            'prenom'=>'admin',
            'telephone'=>'+22890000000',
            'email'=>'admin@admin.com',
            'adresse'=>'admin',
            'password'=>bcrypt('admin'),
            'level'=>'1',
        ]);
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
