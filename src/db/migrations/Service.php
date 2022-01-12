<?php

require "./src/db/bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('services', function ($table) {
       $table->increments('id');
       $table->string('name');
       $table->string('email');
       $table->integer('phone_number');
       $table->string('apartment_address');
       $table->date('date');
       $table->time('time');
       $table->rememberToken();
       $table->timestamps();
   });