<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

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

	public function down()
	{
        Schema::drop('books');
	}

}
