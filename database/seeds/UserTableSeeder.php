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
                    'name' => 'admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('123456'),
                ),
            1 =>
                array (
                    'name' =>'amir',
                    'email' =>'amir@yahoo.com',
                    'password' => bcrypt('123456'),
                ),
        ));


        echo 'email: admin@admin.com password: 123456 created';

    }
}
