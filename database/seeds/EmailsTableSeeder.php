<?php

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();


        \DB::table('categories')->insert(array (
            0 =>
                array (
                    'title' => 'friends',

                ),
            1 =>
                array (

                    'title' => 'family',

                ),

            2 =>
                array (

                    'title' => 'business',

                ),
        ));




        \DB::table('emails')->delete();


        \DB::table('emails')->insert(array (
            0 =>
                array (
                    'email' => 'hadi@gmail.com',
                    'category_id' => '1',

                ),
            1 =>
                array (
                    'email' =>'amir@yahoo.com',
                    'category_id' => '2',

                ),
        ));


    }
}
