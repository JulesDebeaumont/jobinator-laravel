<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('pay')->nullable();
            $table->string('location')->nullable();
            $table->string('departement')->nullable();
            $table->string('country');
            $table->boolean('isRemote')->default(false);
            $table->integer('experience')->nullable();
            $table->string('company');
            $table->timestamps();
            
            // Links
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            
            $table->bigInteger('categories_id')->unsigned()->nullable();
            $table->foreign('categories_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
