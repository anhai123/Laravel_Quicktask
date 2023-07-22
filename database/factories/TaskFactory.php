<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
     return [
            'user_id' => '1',
            'name' => $this->faker->name,
            'start_time' => now(),
            'end_time' => now()->addDay(5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
