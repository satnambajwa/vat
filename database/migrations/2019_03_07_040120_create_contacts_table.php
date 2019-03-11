<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('contact_name');
            $table->string('account_number');
            
            //$table->string('primary_first_name');
            //$table->string('primary_last_name');
            //$table->string('primary_email');

            $table->string('phone');
            $table->string('fax');
            $table->string('mobile');
            $table->string('direct_dail');
            $table->string('skype');
            $table->string('website');

            $table->string('address');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->string('is_same_postal');
            $table->string('street_address');
            $table->string('street_address1');
            $table->string('street_address2');
            $table->string('street_city');
            $table->string('street_state');
            $table->string('street_postal_code');
            $table->string('street_country');
            
            $table->string('sales_account_id');
            $table->enum('sales_amount_tax',array('Tax Exclusive','Tax Inclusive','No Tax'));
            $table->string('purchase_account_id');
            $table->enum('purchase_amount_tax',array('Tax Exclusive','Tax Inclusive','No Tax'));
            
            $table->bigInteger('vat_eu_country_id');
            $table->string('vat_eu_num');
            $table->bigInteger('default_sale_account_id');
            $table->bigInteger('default_purchase_account_id');
            $table->string('company_registration_number');
            $table->string('sales_discount_per');
            $table->bigInteger('currency_id');

            $table->string('bank_account_number');
            $table->string('bank_account_name');
            $table->string('bank_detials');

            
            $table->string('bills_due_date');
            $table->enum('bills_due_date_suggestions',array('of the following month','day(s) after the bill date','day(s) after the end of the bill month','of the current month'));
            $table->string('Invoices Due Date');
            $table->enum('invoices_due_date_suggestions',array('of the following month','day(s) after the bill date','day(s) after the end of the bill month','of the current month'));
            $table->string('Xero Network Key');
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
        Schema::dropIfExists('contacts');
    }
}
