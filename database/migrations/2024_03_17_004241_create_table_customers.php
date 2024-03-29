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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('identify_id');
            $table->integer('gender');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->string('address');
            $table->integer('status');
            $table->string('img');
            // Foreign keys
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')
                -> references('id')
                -> on ('roles');

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
        Schema::dropIfExists('customers');
    }
};
