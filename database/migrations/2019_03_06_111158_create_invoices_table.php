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
            $table->bigInteger('currency_id');
            $table->bigInteger('contact_id');
            $table->string('code');
            $table->string('reference');
            $table->string('date');
            $table->string('estimated_date');//due date or delivery date 
            $table->enum('amount_tax',array('Tax Exclusive','Tax Inclusive','No Tax'));
            $table->decimal('sub_total', 10, 2);
            $table->decimal('vat', 5, 2);
            $table->decimal('total', 10, 2);
            $table->enum('type',array('Invoice','Purchase Order','Quote'));
            
            //if Purchase order
            $table->longText('address');
            $table->string('attention');
            $table->string('telephone');
            $table->longText('delivery_instructions');//delivery_instructions for purchase and terms for quote
            
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
