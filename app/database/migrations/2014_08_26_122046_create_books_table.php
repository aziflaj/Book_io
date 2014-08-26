<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('books', function($table) {
            $table->increments('id');
            $table->string('ISBN')->unique();
            $table->string('title');
            $table->string('author');
            $table->string('category');
            $table->string('publishing_house');
            $table->integer('page_no');
            $table->integer('publishing_year');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('books');
	}

}
