<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
             'title' => 'IB Art 11-1',
         	 'course_id' => NULL,
         	 'site_id' => 1,
         	 'is_active' => 1,
             'is_open' => 1,
         	 'registrationCode' => 'art11-1'         	 
         	 ]);

         DB::table('sections')->insert([
             'title' => 'IB Art 11-2',
         	 'course_id' => NULL,
         	 'site_id' => 1,
             'is_active' => 1,
             'is_open' => 1,
         	 'registrationCode' => 'art11-2'         	 
         	 ]);

         DB::table('sections')->insert([
             'title' => 'Session 1',
             'course_id' => NULL,
             'site_id' => 2,
             'is_active' => 1,
             'is_open' => 1,
             'registrationCode' => 'summer1'             
             ]);

         DB::table('sections')->insert([
             'title' => 'Session 2',
             'course_id' => NULL,
             'site_id' => 2,
             'is_active' => 1,
             'is_open' => 1,
             'registrationCode' => 'summer2'             
             ]);

         // Users

          DB::table('section_user')->insert([
             'section_id' => '1',
             'user_id' => '1',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '2',
             'user_id' => '1',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '3',
             'user_id' => '1',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '4',
             'user_id' => '1',
             ]);

          DB::table('section_user')->insert([
             'section_id' => '1',
             'user_id' => '9',
             ]);



       }
}
