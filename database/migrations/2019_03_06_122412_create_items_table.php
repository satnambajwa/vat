<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('code');
            $table->string('name');
            $table->longText('discription');

            $table->tinyInteger('is_purchase')->default(1);
            $table->decimal('purchase_unit_price', 10, 2);
            $table->bigInteger('purchase_account_id')->default(0);
            $table->bigInteger('purchase_tax_id')->default(0);
            $table->longText('purchase_discription');

            $table->tinyInteger('is_sell')->default(1);
            $table->decimal('sell_unit_price', 10, 2);
            $table->bigInteger('sell_account_id')->default(0);
            $table->bigInteger('sell_tax_id')->default(0);
            $table->longText('sell_discription');
            
            $table->tinyInteger('is_track')->default(1);
            $table->bigInteger('inventory_account_id')->default(0);

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
        Schema::dropIfExists('items');
    }
}
