<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->date('date_of_birth')->nullable();
            $table->string('provided_service')->nullable();
            $table->longText('past_experience')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->string('domain_of_interest_1')->nullable();
            $table->string('domain_of_interest_2')->nullable();
            $table->string('domain_of_interest_3')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('account');
    }
}
