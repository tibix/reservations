<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'guide_id' => User::factory()->guide(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'start_time' => Carbon::now(),
            'price' => fake()->randomNumber(5),
        ];
    }
}
