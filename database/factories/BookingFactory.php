<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'Pc_Name' => $this->faker->name(),
            'Pc_Price' => $this->faker->word(),
            'StartTime' => Carbon::now(),
            'EndTime' => Carbon::now(),
            'User_Name' => $this->faker->userName(),
            'duration' => $this->faker->word(),
        ];
    }
}
