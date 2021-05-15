<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        // Create 50 product records
        for ($i = 0; $i < 10; $i++) {
            Item::create([
                'document_type' => $faker->title,
                'first_name' => $faker->name(1),
                'other_names' => $faker->name(2),
                'phone_number' => $faker->randomNumber(9),
                'reward' => $faker->boolean(1)
            ]);
        }
    }
}
