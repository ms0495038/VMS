<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_processes_membership', function (Blueprint $table) {
            $table->integer('fk_user_id')->unsigned()->default(0);
            $table->foreign('fk_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('fk_process_id')->unsigned()->default(0);
            $table->foreign('fk_process_id')->references('id')->on('processes')->onDelete('cascade');
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
        Schema::drop('users_processes_membership');
    }
}
