<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('location_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job_title');
            $table->string('profile_image');
            $table->text('brief_bio');
            $table->string('phone');
            $table->string('mobile');
            $table->string('website');
            $table->string('skype');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('linkedIn');
            $table->string('google+');
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
        Schema::dropIfExists('profiles');
    }
}
