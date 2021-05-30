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
                'document_type' => $faker->randomElement(['id-card', 'passport','driver-license','credit-card']),
                'first_name' => $faker->firstName(),
                'other_names' => $faker->LastName(2),
                'phone_number' => $faker->randomElement(['670004518', '669123485', '697845147']),
                'reward' => $faker->randomElement(['yes', 'no'])
            ]);
        }
    }
}
