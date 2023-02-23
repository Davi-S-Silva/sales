<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retorno_nota', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nota');
            $table->integer('motivo');
            $table->string('observacao');
            $table->date('data_retorno');
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
        if (Schema::hasTable('retorno_nota')) {
            Schema::drop('retorno_nota');
        }
    }
};
