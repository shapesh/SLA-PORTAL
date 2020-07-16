<?php

require "../bootstrap.php";



use Illuminate\Database\Capsule\Manager as Capsule;



Capsule::schema()->create('tokens', function ($table) {

    $table->increments('id');

    $table->string('token');

    $table->integer('user_id')->unsigned();

    $table->timestamp('token_expires');

    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

});
