<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveForeigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classrooms', function (Blueprint $table){
              $table->dropForeign('çlassrooms_user_id_foreign');
        });
        Schema::table('posts', function (Blueprint $table){
            $table->dropForeign('posts_user_id_foreign');
            $table->dropForeign('posts_çlassroom_id_foreign');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classrooms', function (Blueprint $table){
            $table->Foreign('user_id')->references('id')->on('users');
      });
      Schema::table('posts', function (Blueprint $table){
        $table->Foreign('user_id')->references('id')->on('users');
        $table->Foreign('classroom_id')->references('id')->on('classrooms');
    });
    }
}
