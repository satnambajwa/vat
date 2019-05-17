<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('gst_number')->nullable();
            $table->bigInteger('tan_number')->nullable();
            $table->bigInteger('pan_number')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();            
            $table->string('mail_name')->nullable();
            $table->string('address')->nullable();
            $table->string('address1')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile')->nullable();
            $table->string('financial_year')->nullable();
            $table->string('book_begin_from')->nullable();
            $table->string('decimal_no')->default(2);
            $table->tinyInteger('is_current');
            $table->tinyInteger('show_in_millions')->default(0);
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
        Schema::dropIfExists('companies');
    }
}
