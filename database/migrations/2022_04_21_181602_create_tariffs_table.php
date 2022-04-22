<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsTable extends Migration
{

    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('zone_id')->nullable();
            $table->decimal('from_weight', 9)->nullable();
            $table->decimal('to_weight', 9);
            $table->decimal('price');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tariffs');
    }
}
