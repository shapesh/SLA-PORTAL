<?php

//require "./vendor/autoload.php";
//require "./../vendor/autoload.php";
require_once(__DIR__ .'/../vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;



$capsule->addConnection([

    "driver" => "pgsql",

    "host" =>"127.0.0.1",

    "database" => "sla-portal",

    "username" => "postgres",

    "password" => "postgres"

]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
