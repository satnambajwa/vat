<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('currency_id')->nullable();
            $table->bigInteger('contact_id')->nullable();
            $table->string('code')->nullable();
            $table->string('reference')->nullable();
            $table->string('date')->nullable();
            $table->string('estimated_date')->nullable();//due date or delivery date 
            $table->string('amount_tax')->default('Tax Exclusive');
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('vat', 5, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->enum('type',array('Invoice','Purchase Order','Quote'))->nullable();
            

            $table->decimal('amount_paid', 15, 2)->nullable();
            $table->string('date_paid')->nullable();
            $table->string('paid_to')->nullable();
            //if Purchase order
            $table->longText('address')->nullable();
            $table->string('attention')->nullable();
            $table->string('telephone')->nullable();
            $table->longText('delivery_instructions')->nullable();
            //delivery_instructions for purchase and terms for quote
            $table->timestamps();
            //$table->dropSoftDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
