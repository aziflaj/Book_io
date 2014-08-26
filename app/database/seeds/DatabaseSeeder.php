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