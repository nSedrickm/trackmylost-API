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
                'message' => $faker->randomElement(['Found item for Ngwa', 'New agent registered']),
            ]);
        }
    }
}
