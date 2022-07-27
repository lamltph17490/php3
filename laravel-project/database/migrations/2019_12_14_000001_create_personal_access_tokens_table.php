<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\PostgresSchemaState;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
        });
    }
//     $table->id();
//     $table->string('name');
//     $table->string('desc')->nullable();
//     $table->string('code')-> nullable();
//     $table->unsignedInteger('status');
//     $table->unsignedBigInteger('user_id');
//     $table->foreign('user_id')->references('id')->on('user');
//     $table->timestamps();
//     Post
//     $table->id();
//     $table->string('content');
// $table->unsignedBigInteger('user_id');
// $table->foreign('user_id')->references('id')->on('users');
// $table->unsignedBigInteger('classroom_id');
// $table->foreign('classroom_id')->references('id')->on('classrooms');
// $table->unsignedInteger('status');
//     $table->timestamps();
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
}
