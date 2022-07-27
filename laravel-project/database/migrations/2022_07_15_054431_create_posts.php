<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosts extends Migration
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
    $table->string('content');
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');
$table->unsignedBigInteger('classroom_id');
$table->foreign('classroom_id')->references('id')->on('classrooms');
$table->unsignedInteger('status');
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
        Schema::dropIfExists('posts');
    }
}