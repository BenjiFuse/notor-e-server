<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('note_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('text');
            $table->timestamps();
            // table constraints:
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->foreign('note_id')
                  ->references('id')
                  ->on('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
