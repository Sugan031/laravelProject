<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("users_model")->insert([
            'name'=>'Tony Stark',
            'email'=> 'tonystark@gmail.com',
            'password'=> Hash::make('Hello@123')
        ]);
    //    User::factory(2)->create();
    }
}
