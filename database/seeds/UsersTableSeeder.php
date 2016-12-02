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
        \App\User::create([
        	'name' => 'User1',
	        'email' => 'user1@example.com',
	        'password' => bcrypt('testtest'),
        ]);
	    \App\User::create([
		    'name' => 'User2',
		    'email' => 'user2@example.com',
		    'password' => bcrypt('testtest'),
	    ]);
	    \App\User::create([
		    'name' => 'User3',
		    'email' => 'user3@example.com',
		    'password' => bcrypt('testtest'),
	    ]);
    }
}
