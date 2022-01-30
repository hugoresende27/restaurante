<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       
        $faker = \Faker\Factory::create();
        
        User::create([
        'name'=>$faker->name,
        'email'=>$faker->email,
        'password'=> bcrypt('password')
            ]);
        
    }
}
