<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateClientsTable extends Migration{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(){
        Schema::create('clients', function(Blueprint $table){
            $table->id();
            $table->string('name', 45)->nullable();
            $table->bigInteger('phone')->unique();
            $table->boolean('phone_verified')->default(0);
            $table->string('verify_code', 6)->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_seller')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(){
        Schema::dropIfExists('clients');
    }
}
