<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('reply');
            $table->unsignedInteger('comment_id');
            $table->string('repliable_type');
            $table->unsignedBigInteger('repliable_id');
            $table->timestamps();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('replies', function(Blueprint $table)
		{
            $table->dropForeign('replies_comment_id_foreign');
		});
        Schema::dropIfExists('replies');
    }
}
