<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserPointsSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->points()->create([
                "points" => 50,
                "activity" => "Signup bonus",
            ]);

            $user->points()->create([
                "points" => 30,
                "activity" => "Daily login",
            ]);
        }
    }
}
