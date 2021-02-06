<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Coupon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CouponSeeder::class,
            // TeamSeeder::class,
        ]);

        User::factory()->times(50)->state([
            'created_at' => fn () => now()->subMinutes(rand(0, 59)),
            ])->create();

        // Coupon::factory()->times(50)->state([
        //     'created_at' => fn () => now()->subMinutes(rand(0, 59)),
        //     ])->create();
    }
}
