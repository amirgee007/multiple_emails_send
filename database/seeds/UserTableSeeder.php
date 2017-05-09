<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->delete();


        \DB::table('users')->insert(array (
            0 =>
                array (
                    'name' => 'hadi',
                    'email' => 'hadi@gmail.com',
                    'password' => bcrypt('123456'),
                ),
            1 =>
                array (
                    'name' =>'amir',
                    'email' =>'amirgee007@yahoo.com',
                    'password' => bcrypt('123456'),
                ),
        ));


    }
}
