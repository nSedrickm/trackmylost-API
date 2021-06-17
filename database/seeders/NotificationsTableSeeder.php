<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationsTableSeeder extends Seeder
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
            Notification::create([
                'type' => $faker->randomElement(['item-found', 'agent-registered']),
                'document_type' => $faker->randomElement(['id-card', 'passport', 'driver-license', 'credit-card']),
                'phone_number' => $faker->randomElement(['670004518', '669123485', '697845147']),
                'name' => $faker->firstName()
            ]);
        }
    }
}
