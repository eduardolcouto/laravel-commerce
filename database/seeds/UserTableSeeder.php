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
        
    	DB::table('users')->truncate();
        factory(\CodeCommerce\User::class)->create([
            'name'=>'Eduardo Couto',
            'email'=>'eduardo.lcouto@gmail.com',
            'password'=>bcrypt('123456'),
        ]);
        factory(\CodeCommerce\User::class,5)->create();
    }
}
