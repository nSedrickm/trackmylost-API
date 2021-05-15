<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alert;

class AlertsTableSeeder extends Seeder
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
            Alert::create([
                'name' => $faker->name(1),
                'document_type' => $faker->title,
                'email' => $faker->safeEmail,
                'phone_number' => $faker->randomNumber(9),
            ]);
        }
    }
}
