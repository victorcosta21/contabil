<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_controls', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->unsigned();
            $table->string('month');
            $table->integer('payment');
            $table->string('dueDate')->nullable()->default('0000-00-00');
            $table->string('cpPrevision')->nullable()->default('0000-00-00');
            $table->string('comments')->nullable();
            $table->double('ammount', 10, 2)->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_controls');
    }
}
