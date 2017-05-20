<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('description');
            $table->string('id_client');
            $table->string('id_agent');
            $table->string('status');
            $table->string('created');
            $table->boolean('close');
            $table->boolean('remove');
            $table->rememberToken();
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
        //
    }
}
