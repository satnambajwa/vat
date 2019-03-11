<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('account_groups_id');
            $table->bigInteger('tax_id');
            $table->string('code');
            $table->string('name');
            $table->longText('description');
            $table->tinyInteger('show_dashboard_watchlist')->default(0);
            $table->tinyInteger('show_expense_claims')->default(0);
            $table->tinyInteger('enable_payments')->default(0);
            $table->timestamps();
            $table->tinyInteger('status')->default(1);
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
