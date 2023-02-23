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
        Schema::create('refrete_as', function (Blueprint $table) {
            $table->id();
            $table->integer('id_as');
            $table->date('data_refrete');
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
        if (Schema::hasTable('refrete_as')) {
            Schema::drop('refrete_as');
        }
    }
};
