<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->integer('commune_id');
           // $table->foreign('commune_id')->references('id')->on('wila_com')->onDelete('cascade');

            $table->string('service_image')->nullable();
            $table->string('title');
            $table->string('address');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->text('body');
            $table->text('tags');
            $table->double('distance')->nullable();
            $table->boolean('shipping')->nullable();
            $table->string('home')->nullable();
            $table->string('vehicule_shape')->nullable();
            $table->text('covering_territory')->nullable(); 
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
        Schema::dropIfExists('services');
    }
}
