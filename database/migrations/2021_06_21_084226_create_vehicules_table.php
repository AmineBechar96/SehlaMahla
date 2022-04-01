<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model', 50);
            $table->string('brand', 50);
            $table->string('notes', 100);
            $table->integer('proDate');
            $table->string('type', 100);
            $table->string('energie', 100);
            $table->integer('kilometrage');
            $table->string('transmission', 50);
            $table->string('couleur', 100);
            $table->string('ch', 100);
            $table->decimal('litre', 8,2);
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
        Schema::dropIfExists('vehicules');
    }
}
