<?php

namespace Database\Factories;

use App\Models\AverageBall;
use App\Models\Event;
use App\Models\Student;
use App\Models\TypeIndivAchiv;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PartificationFactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date'=>$this->faker->date,
            'category' => $this->faker->word,
            'student_id' => Student::get()->random()->id,
            'event_id'=>Event::get()->random()->id
        ];
    }
}
