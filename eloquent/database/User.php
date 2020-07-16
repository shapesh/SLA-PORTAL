<?php

require '../bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function ($table) {

    $table->increments('id');

    $table->string('first_name');

    $table->string('last_name');

    $table->string('email')->unique();

    $table->string('phone_number')->unique();

    $table->string('password');

    $table->string('user_image')->nullable();

    $table->tinyInteger('confirm_reg')->nullable()->default('0');

    $table->rememberToken();

    $table->timestamps();

});
