<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('creer_par')->nullable();
            $table->unsignedBigInteger('modifier_par')->nullable();
            $table->foreign('creer_par')->references('id')->on('users')->undelete('cascade');
            $table->foreign('modifier_par')->references('id')->on('users')->undelete('cascade');
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
        Schema::dropIfExists('projets');
    }
}
