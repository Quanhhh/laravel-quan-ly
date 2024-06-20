<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FlowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('flowers')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(200,300, 'flowers', true),
                'origin' => $faker->country,
            ]);
        }
    }
}
