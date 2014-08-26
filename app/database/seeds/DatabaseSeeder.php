<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->call('BookTableSeeder');
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
                'ISBN'             => $faker->ean13(),
                'title'            => $faker->sentence($nbWords = 3),
                'author'           => $faker->name(),
                'category'         => $faker->randomElement($categories),
                'publishing_house' => $faker->word(),
                'page_no'          => $faker->numerify('###'),
                'publishing_year'  => $faker->year(),
            ));

        }

    }
}