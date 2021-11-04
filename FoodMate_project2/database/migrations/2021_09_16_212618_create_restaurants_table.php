<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table->string('restaurant_name');
            $table->string('address');
            $table->string('business_license');
            $table->string('telephone');
            $table->string('email');
            $table->string('owner_name')->nullable();
            $table->string('tel_owner');
            $table->string('avatar')->nullable();
            $table->integer('user_id');
            $table->integer('package')->default(0);
            $table->integer('status')->default(1);
            $table->double('rating')->default(0);
            $table->integer('stop')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

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
        Schema::dropIfExists('restaurants');
    }
}
