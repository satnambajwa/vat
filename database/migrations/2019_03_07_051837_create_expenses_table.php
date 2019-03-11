<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('currency_id');
            $table->bigInteger('contact_id');
            $table->bigInteger('tax_id');
            $table->bigInteger('account_id');
            $table->decimal('amount', 10, 2);
            $table->longtext('description');
            $table->string('spend_at');
            $table->string('spent_on');
            $table->string('lable');
            $table->enum('amount_tax',array('Tax Exclusive','Tax Inclusive'));
            $table->decimal('sub_total', 10, 2);
            $table->decimal('vat', 5, 2);
            $table->decimal('total', 10, 2);
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
        Schema::dropIfExists('expenses');
    }
}
