<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
            $table->string('description');
            $table->text('details');
            $table->string('image');
            $table->string('banner');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('status',['open','closed'])->default('closed');
            $table->enum('reg_type',['participant','attendee','both'])->default('participant');
            $table->bigInteger('participant_price')->default(0);
            $table->bigInteger('attendee_price')->default(0);
            $table->string('venue');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('admin_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
