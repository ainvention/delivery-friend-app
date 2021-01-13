<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // check if table users is empty
        if (DB::table('users')->get()->count() == 0) {
              DB::table('users')->insert([
                [ 'id' => 1,
                  'name' => 'alex sung',
                  'email' => 'alex@alex.no',
                  'email_verified_at' => now(),
                  'password' => bcrypt('alex1234'),
                  'remember_token' => Str::random(10),
                  'current_team_id' => 1,
                ],
                [
                  'id' => 2,
                  'name' => 'boa choi',
                  'email' => 'boa@boa.no',
                  'email_verified_at' => now(),
                  'password' => bcrypt('alex1234'),
                  'remember_token' => Str::random(10),
                  'current_team_id' => 2,
                ],
                [
                  'id' => 3,
                  'name' => 'sara sung',
                  'email' => 'sara@sara.no',
                  'email_verified_at' => now(),
                  'password' => bcrypt('alex1234'),
                  'remember_token' => Str::random(10),
                  'current_team_id' => 3,
                ]
              ]);
        } else {
            User::factory()->times(50)->state([
                'created_at' => fn () => now()->subMinutes(rand(0, 59)),
            ])->create();
        }
    }
}
