<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit__supports', function (Blueprint $table) {
            $table->id();
            $table->text('message_text');
            $table->boolean('is_admin')->default(true);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->ipAddress('client_ip')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('submit__supports');
    }
}
