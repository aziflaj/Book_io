<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->call('BookTableSeeder');
        $this->call('LibraryBooksTableSeeder');

    }

}
class UserTableSeeder extends Seeder {

    public function run() {

        $faker = Faker\Factory::create();
        DB::table('users')->delete();
        User::create(array(
            'username'      => 'foobar',
            'password'      =>  Hash::make('asdf'),
            'library_name'  => 'first',
            'email'         => 'firstlibrary@gmail.com'
        ));

        for ($i=1; $i < 10; $i++) {
            User::create(array(
                'username'      => $faker->userName(),
                'password'      =>  Hash::make($faker->word()),
                'library_name'  => $faker->word(),
                'email'         => $faker->email(),
            ));

        }

    }
}


class BookTableSeeder extends Seeder {

    public function run() {
        $categories = array('Cat1', 'Cat2', 'Cat3');

        $faker = Faker\Factory::create();
        DB::table('books')->delete();

        for ($i=0; $i < 10; $i++) {
            Book::create(array(
                'isbn'             => $faker->ean13(),
                'title'            => $faker->sentence($nbWords = 3),
                'author'           => $faker->name(),
                'category'         => $faker->randomElement($categories),
                'publishing_house' => $faker->word(),
                'page_no'          => $faker->numerify('###'),
                'publishing_year'  => $faker->year(),
            ));

        }

        Book::create(array(
            'isbn'             => $faker->ean13(),
            'title'            => $faker->sentence($nbWords = 3),
            'author'           => "Murat Memalla",
            'category'         => $faker->randomElement($categories),
            'publishing_house' => $faker->word(),
            'page_no'          => $faker->numerify('###'),
            'publishing_year'  => $faker->year(),
        ));

        Book::create(array(
            'isbn'             => $faker->ean13(),
            'title'            => $faker->sentence($nbWords = 3),
            'author'           => "Murat Memalla",
            'category'         => $faker->randomElement($categories),
            'publishing_house' => $faker->word(),
            'page_no'          => $faker->numerify('###'),
            'publishing_year'  => $faker->year(),
        ));

    }
}

class LibraryBooksTableSeeder extends Seeder {
    public function run() {
        $faker = Faker\Factory::create();

        //getting all books from the table
        $books = Book::all();

        $isbn_list = array();

        //getting all ISBNs into a single array
        foreach ($books as $book) {
            array_push($isbn_list,$book->isbn);
        }

        DB::table('library_books')->delete();

        for($i=0;$i<15;$i++) {
            $fake_library_id = $faker->numberBetween(1,10);
            $fake_book_isbn = $faker->randomElement($isbn_list);

            //checking for duplications
            if(LibraryBooks::where('user_id','=',$fake_library_id)
                            ->where('book_isbn','=',$fake_book_isbn)->count() > 0) {
                continue;
            }

            LibraryBooks::create(array(
                'user_id'       => $fake_library_id,
                'book_isbn'     => $fake_book_isbn,
                'copies_no'     => $faker->numerify('##')
            ));
        }

    }
}