<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('pricings')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_pricings');
    }
}
