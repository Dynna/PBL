<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserIdFk2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agreement_pact', function (Blueprint $table) {
            $table->foreign('user_id_2')
                ->references('account_id')
                ->on('account')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agreement_pact', function (Blueprint $table) {
            $table->dropForeign('agreement_pact_user_id_2_foreign');
        });
    }
}
