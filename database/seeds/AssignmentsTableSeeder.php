<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Simple Assignment #1

         DB::table('assignments')->insert([
             'title' => 'Ex Libris Bookplate',
             'cover_thumb' => 'uploads/1548200980.thumb.jpg',
             'description' => 'In this assignment, students will explore the history and process of relief printmaking using Linoleum to develop a unique Ex Libris bookplates composition, that combines text and personally symbolic imagery.',
         	 'section_id' => '3',
         	 'course_id' => null,
             'site_id' => '1',
         	 'is_complex' => false,
         	 'is_active' => true

         ]);

        DB::table('components')->insert([
             'title' => 'Ex Libris Bookplate',
             'assignment_id' =>'1',
             'date_due' => Carbon::now()->addWeeks(1)             
             ]);

         
         DB::table('assignments')->insert([
             'title' => 'Charcoal Still Life',
             'cover_thumb' => 'uploads/1548200980.thumb.jpg',
             'description' => 'In this assignment, students will focus on developing the skills necesasary to render form and space',
             'section_id' => '3',
             'course_id' => null,
             'site_id' => '1',
             'is_complex' => false,
             'is_active' => true

         ]);

         DB::table('components')->insert([
             'title' => 'Charcoal Still Life',
             'assignment_id' =>'2',
             'date_due' => Carbon::now()->addWeeks(2)             
             ]);


         DB::table('assignments')->insert([
             'title' => 'Abstract Painting',
             'cover_thumb' => 'uploads/1526488096.thumb.jpeg',
             'description' => 'In this assignment, students will interpret music in a visual form focusing on the parallels between form in music and art',
             'section_id' => '3',
             'course_id' => null,
             'site_id' => '1',
             'is_complex' => false,
             'is_active' => true

         ]);

         DB::table('components')->insert([
             'title' => 'Abstract Painting',
             'assignment_id' =>'3',
             'date_due' => Carbon::now()->addWeeks(3)            
             ]);

        // Begin Complex Assignments

         DB::table('assignments')->insert([
             'title' => 'Project #0',
             'cover_thumb' => 'uploads/1526488096.thumb.jpeg',
             'description' => 'Starting out with research',
             'section_id' => '1',
             'course_id' => null,
             'site_id' => '1',
             'is_complex' => true,
             'is_active' => true

         ]);

         DB::table('components')->insert([
             'title' => 'Visual Research',
             'assignment_id' =>'4',
             'date_due' => Carbon::now()->addWeeks(1)            
             ]);

         DB::table('components')->insert([
             'title' => 'Artwork Analysis',
             'assignment_id' =>'4',
             'date_due' => Carbon::now()->addWeeks(2)             
             ]);

         DB::table('components')->insert([
             'title' => 'Ideation',
             'assignment_id' =>'4',
             'date_due' => Carbon::now()->addWeeks(3)            
             ]);


        DB::table('assignments')->insert([
             'title' => 'Project #1',
             'cover_thumb' => 'uploads/1526488096.thumb.jpeg',
             'description' => 'Woeking in Value',
             'section_id' => '1',
             'course_id' => null,
             'site_id' => '1',
             'is_complex' => true,
             'is_active' => true

         ]);

         DB::table('components')->insert([
             'title' => 'Visual Research',
             'assignment_id' =>'5',
             'date_due' => Carbon::now()->addWeeks(4)            
             ]);

         DB::table('components')->insert([
             'title' => 'Artwork Analysis',
             'assignment_id' =>'5',
             'date_due' => Carbon::now()->addWeeks(5)            
             ]);

         DB::table('components')->insert([
             'title' => 'Ideation',
             'assignment_id' =>'5',
             'date_due' => Carbon::now()->addWeeks(6)            
             ]);
    }

}
