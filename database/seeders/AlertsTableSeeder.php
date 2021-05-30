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
                'document_type' => $faker->randomElement(['id-card', 'passport', 'driver-license', 'credit-card']),
                'phone_number' => $faker->randomElement(['670004518', '669123485', '697845147']),
            ]);
        }
    }
}
