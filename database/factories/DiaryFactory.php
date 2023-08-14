<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Diary;

class DiaryFactory extends Factory
{
    protected $model = Diary::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => $this->faker->numberBetween(1, 100), // Replace with appropriate range
            'supervisor_id' => $this->faker->numberBetween(1, 100), // Replace with appropriate range
            'plan_today' => $this->faker->paragraph,
            'end_today' => $this->faker->paragraph,
            'plan_tomorrow' => $this->faker->paragraph,
            'roadblocks' => $this->faker->paragraph,
            'summary' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([0,1]),
        ];
    }
}
