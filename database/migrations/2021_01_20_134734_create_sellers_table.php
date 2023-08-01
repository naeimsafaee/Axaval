<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
//            $table->bigInteger('phone')->unique();
//            $table->string('full_name')->nullable();
//            $table->string('avatar')->nullable();
            $table->string('melli_card')->nullable();
            $table->string('home_phone')->nullable();
            $table->unsignedBigInteger('town_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->text('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('hesab_number')->nullable();
            $table->string('shaba_number')->nullable();
            $table->string('card_number')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('melli_code')->nullable();
            $table->string('shanasname_number')->nullable();
            $table->enum('gender', ["زن", "مرد"])->nullable();
//            $table->string('verify_code', 6)->nullable();
//            $table->boolean('phone_verified')->default(0);
            $table->tinyInteger('is_active')->default(0);


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
        Schema::dropIfExists('sellers');
    }
}
