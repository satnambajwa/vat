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
            $table->string('contact_name')->nullable();
            $table->string('account_number')->nullable();

            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile')->nullable();
            $table->string('direct_dail')->nullable();
            $table->string('skype')->nullable();
            $table->string('website')->nullable();

            $table->string('address')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('is_same_postal')->nullable();
            $table->string('street_address')->nullable();
            $table->string('street_address1')->nullable();
            $table->string('street_address2')->nullable();
            $table->string('street_city')->nullable();
            $table->string('street_state')->nullable();
            $table->string('street_postal_code')->nullable();
            $table->string('street_country')->nullable();
            
            $table->string('sales_account_id')->nullable();
            $table->enum('sales_amount_tax',array('Tax Exclusive','Tax Inclusive','No Tax'));
            $table->string('purchase_account_id')->nullable();
            $table->enum('purchase_amount_tax',array('Tax Exclusive','Tax Inclusive','No Tax'));
            
            $table->bigInteger('vat_eu_country_id')->nullable();
            $table->string('vat_eu_num')->nullable();
            $table->bigInteger('default_sale_account_id')->nullable();
            $table->bigInteger('default_purchase_account_id')->nullable();
            $table->string('company_registration_number')->nullable();
            $table->string('sales_discount_per')->nullable();
            $table->bigInteger('currency_id')->nullable();

            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_detials')->nullable();
            
            $table->string('type')->default('customer');

            
            $table->string('bills_due_date')->nullable();
            $table->enum('bills_due_date_suggestions',array('of the following month','day(s) after the bill date','day(s) after the end of the bill month','of the current month'));
            $table->string('invoices_due_date')->nullable();
            $table->enum('invoices_due_date_suggestions',array('of the following month','day(s) after the bill date','day(s) after the end of the bill month','of the current month'));
            $table->string('xero_network_key')->nullable();
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
