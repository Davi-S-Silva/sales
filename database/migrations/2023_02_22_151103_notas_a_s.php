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
        Schema::create('notas_as', function (Blueprint $table) {
            $table->id();
            $table->integer('id_as');
            $table->integer('nota')->unique();
            $table->integer('id_tipo_pagamento');
            $table->decimal('valor', 8, 2);
            $table->integer('status');
            $table->date('data_conclusao')->nullable();
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
        if (Schema::hasTable('notas_as')) {
            Schema::drop('notas_as');
        }
    }
};
