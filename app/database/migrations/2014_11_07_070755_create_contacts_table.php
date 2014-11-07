<?php

use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('body', 255);
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }

}