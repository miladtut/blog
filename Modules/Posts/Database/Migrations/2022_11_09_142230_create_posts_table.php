<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string ('title')->unique ();
            $table->text ('content');
            $table->unsignedBigInteger ('author');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->string ('image')->nullable ();
            $table->timestamps();
            $table->softDeletes ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
