<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status');
            $table->string('username')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('dob')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->string('image')->default('user.jpg');
            $table->string('address')->nullable();
            $table->unsignedInteger('country_id')->default(1);
            $table->unsignedInteger('state_id')->default(1);
            $table->unsignedInteger('city_id')->default(1);
            $table->boolean('online')->default(true);
            $table->rememberToken();
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
       
       
        Schema::dropIfExists('users');
    }
}
