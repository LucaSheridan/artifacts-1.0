<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  

       DB::table('users')->insert([
            'id' => '1',
            'firstName' => 'Lucas',
            'lastName' => 'Sheridan',
            'email' => 'lsheridan@bsge.org',
            'password' => bcrypt('secret')]);

       DB::table('users')->insert([
            'id' => '2',
            'firstName' => 'Stephanie',
            'lastName' => 'Tramontozzi',
            'email' => 'steph@bsge.org',
            'password' => bcrypt('secret')]);

       DB::table('users')->insert([
            'id' => '3',
            'firstName' => 'Andy',
            'lastName' => 'Warhol',
            'email' => 'warhol@art.org',
            'password' => bcrypt('secret')]);

       DB::table('users')->insert([
            'id' => '4',
            'firstName' => 'Vincent',
            'lastName' => 'Van Gogh',
            'email' => 'vangogh@art.org',
            'password' => bcrypt('secret')]);

       DB::table('users')->insert([
            'id' => '5',
            'firstName' => 'Jackson ',
            'lastName' => 'Pollack',
            'email' => 'pollock@art.org',
            'password' => bcrypt('secret')]);

       DB::table('users')->insert([
            'id' => '6',
            'firstName' => 'Elizabeth',
            'lastName' => 'Murray',
            'email' => 'murray@art.org',
            'password' => bcrypt('secret')]);

        DB::table('users')->insert([
            'id' => '7',
            'firstName' => 'Frida ',
            'lastName' => 'Kahlo',
            'email' => 'kahlo@art.org',
            'password' => bcrypt('secret')]);

        DB::table('users')->insert([
            'id' => '8',
            'firstName' => 'Andrea ',
            'lastName' => 'Manning',
            'email' => 'andrea@alli.org',
            'password' => bcrypt('secret')]);

        DB::table('users')->insert([
            'id' => '9',
            'firstName' => 'Olivia',
            'lastName' => 'Wergoski',
            'email' => 'olivia@bsge.org',
            'password' => bcrypt('secret')]);

    }
}
