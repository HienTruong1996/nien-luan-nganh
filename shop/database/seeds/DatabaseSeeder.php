<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\User::create([
        	'name' => 'Badman',
        	'email' =>'badman@gmail.com',
        	'password' => bcrypt('12345678'),
            'q_ma'=>'1',
            'nv_ma'=>'1'
        ]);

    }
}
