<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'due_date' => $this->faker->date($format='Y-m-d',$min='now'),
            'detail' => $this->faker->realText(),
            'is_important' => $this->faker->randomElement([0,1]),
            'is_completed' => $this->faker->randomElement([0,1]),
        ];
    }
}
