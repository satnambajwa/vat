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
            $table->bigInteger('currency_id')->nullable();
            $table->bigInteger('contact_id')->nullable();
            $table->bigInteger('tax_id')->nullable();
            $table->bigInteger('account_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->longtext('description')->nullable();
            $table->string('spend_at')->nullable();
            $table->string('spent_on')->nullable();
            $table->string('lable')->nullable();
            $table->enum('amount_tax',array('Tax Exclusive','Tax Inclusive'));
            $table->decimal('sub_total', 10, 2)->default(0);
            $table->decimal('vat', 5, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
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
