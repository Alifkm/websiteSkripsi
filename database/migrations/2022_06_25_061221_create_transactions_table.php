<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_type_id')->unsigned();
            $table->integer('transaction_source_id')->unsigned();
            $table->string('transaction_name');
            $table->date('date');
            $table->bigInteger('total');
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('transaction_type_id')
                ->references('id')
                ->on('transaction_types');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('transaction_source_id')
                ->references('id')
                ->on('transaction_sources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
