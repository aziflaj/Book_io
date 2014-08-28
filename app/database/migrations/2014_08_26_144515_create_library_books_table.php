<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryBooksTable extends Migration {

	public function up()
	{
        Schema::create('library_books', function($table) {
            $table->integer('user_id');
            $table->string('book_isbn');
            $table->integer('copies_no');
	    });
    }

	public function down()
	{
        Schema::drop('library_books');
	}

}
