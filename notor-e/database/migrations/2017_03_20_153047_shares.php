<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('friend_id')->unsigned();
            $table->timestamps();
            // table constraints:
            $table->foreign('user_id')
                  ->references('id')->on('users');
            $table->foreign('friend_id')
                  ->references('id')->on('users');
            $table->primary(array('user_id', 'friend_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shares');
    }
}
