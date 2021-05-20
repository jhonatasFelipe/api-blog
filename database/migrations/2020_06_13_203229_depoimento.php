<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Depoimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depoimento', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('texto')->nullable();
            $table->boolean('liberado')->default(false);
            $table->date('data');
            $table->string('status')->default("Não enviado");
            $table->unsignedBigInteger('cliente');
            $table->foreign('cliente')->references('id')->on('cliente')->onDelete('cascade');
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
        Schema::dropIfExists('depoimento');
    }
}
