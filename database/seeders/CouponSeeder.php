<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


          // check if table users is empty
        if (DB::table('coupons')->get()->count() == 0) {
              DB::table('coupons')->insert([
                [
                    'user_id' => 1,
                    'name' => 'discount',
                    'category' => 'sender',
                    // 'number => $faker->randomElement(['sender' ,'helper']),
                    'number' => $this->randomString(),
                    'price' => 100,
                    'rate' => null,
                    'expire' => '2021-1-02 09:05:30',
                    'used' => null,
                ],
                [
                    'user_id' => 2,
                    'name' => 'discount',
                    'category' => 'sender',
                    'number' => $this->randomString(),
                    'price' => null,
                    'rate' => 20,
                    'expire' => '2021-1-02 09:05:30',
                    'used' => null,
                ],
                [
                    'user_id' => 3,
                    'name' => 'discount',
                    'category' => 'sender',
                    'number' => $this->randomString(),
                    'price' => '100',
                    'rate' => null,
                    'expire' => '2021-3-01 09:05:30',
                    'used' => null,
                ],
                [
                    'user_id' => 4,
                    'name' => 'discount',
                    'category' => 'sender',
                    'number' => $this->randomString(),
                    'price' => null,
                    'rate' => 15,
                    'expire' => '2021-3-01 09:05:30',
                    'used' => null,
                ],
                [
                    'user_id' => 5,
                    'name' => 'discount',
                    'category' => 'sender',
                    'number' => $this->randomString(),
                    'price' => '200',
                    'rate' => 10,
                    'expire' => '2021-12-02 09:05:30',
                    'used' => null,
                ]
              ]);
        } else {
            return;
            // Coupon::factory()->times(50)->state([
            //     'created_at' => fn () => now()->subMinutes(rand(0, 59)),
            // ])->create();
        }
    }

    public function randomString()
    {
        $characters  = "0123456789";
        $characters .= "abcdefghijklmnopqrstuvwxyz";
        $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $characters .= "_";

        $string_generated = "";

        $nmr_loops = 10;
        while ($nmr_loops--) {
            $string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        return $string_generated;
    }
}
