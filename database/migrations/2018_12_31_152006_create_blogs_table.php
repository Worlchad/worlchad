<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('summary');
            $table->longText('content');
            $table->string('image');
            $table->string('content_images')->nullable();
            $table->string('tags');
            $table->integer('views')->default(0);
            $table->boolean('published')->default(false);
            $table->timestamp('published_date');
            $table->string('blogable_type');
            $table->unsignedBigInteger('blogable_id');
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
        Schema::dropIfExists('blogs');
    }
}
