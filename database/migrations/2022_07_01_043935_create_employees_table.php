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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('position_type_id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('age');
            $table->string('gender');
            $table->longText('address');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('position_type_id')
                ->references('id')
                ->on('position_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
