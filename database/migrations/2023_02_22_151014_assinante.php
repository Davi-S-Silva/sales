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
        Schema::create('assinante', function (Blueprint $table) {
            $table->id();
            $table->integer('id_as');
            $table->integer('status_assinante');
            $table->date('data_inicio');
            $table->date('data_conclusao');
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
        if (Schema::hasTable('assinante')) {
            Schema::drop('assinante');
        }
    }
};
