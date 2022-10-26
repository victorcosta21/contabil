<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
        });

        DB::table('months')->insert(['month' => 'Janeiro']);
        DB::table('months')->insert(['month' => 'Fevereiro']);
        DB::table('months')->insert(['month' => 'Março']);
        DB::table('months')->insert(['month' => 'Abril']);
        DB::table('months')->insert(['month' => 'Maio']);
        DB::table('months')->insert(['month' => 'Junho']);
        DB::table('months')->insert(['month' => 'Julho']);
        DB::table('months')->insert(['month' => 'Agosto']);
        DB::table('months')->insert(['month' => 'Setembro']);
        DB::table('months')->insert(['month' => 'Outubro']);
        DB::table('months')->insert(['month' => 'Novembro']);
        DB::table('months')->insert(['month' => 'Dezembro']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('months');
    }
}
