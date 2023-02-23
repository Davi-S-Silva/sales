<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('tipo_pagamento', function (Blueprint $table) {
           $table->id();
           $table->string('descricao');
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
       if (Schema::hasTable('tipo_pagamento')) {
           Schema::drop('tipo_pagamento');
       }
   }
};
