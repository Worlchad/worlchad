<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("plan_id");
            $table->enum("status",['active','expired','canceled'])->default('active');
            $table->dateTime("expired_at");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  Schema::table('subscriptions',function(Blueprint $table){ 
            $table->dropForeign('subscriptions_user_id_foreign');
            $table->dropForeign('subscriptions_plan_id_foreign');
        }); 
        Schema::dropIfExists('subscriptions');
       
       
    
    }
}
