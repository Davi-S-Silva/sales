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
        Schema::create('autorizacao_servico', function (Blueprint $table) {
            $table->id();
            $table->integer('num')->unique();
            $table->dateTime('data_as');
            $table->string('destino');
            $table->string('motorista_as');
            $table->decimal('valor_avista', 8, 2);
            $table->decimal('valor_boleto', 8, 2);
            $table->decimal('valor_bonificacao', 8, 2);
            $table->decimal('peso_total', 8, 2);
            $table->integer('quantidade_notas');
            $table->integer('status_as');
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
        if (Schema::hasTable('autorizacao_servico')) {
            Schema::drop('autorizacao_servico');
        }
    }
};
