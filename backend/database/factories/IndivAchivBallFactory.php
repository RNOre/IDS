<?php

namespace Database\Factories;

use App\Models\AverageBall;
use App\Models\Student;
use App\Models\TypeIndivAchiv;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IndivAchivBallFactory extends Factory
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
            'value' => rand(1, 10),
            'student_id'=>Student::get()->random()->id,
            'type_indiv_achiv_id'=>TypeIndivAchiv::get()->random()->id,
            'average_ball_id'=>AverageBall::get()->random()->id
        ];
    }
}
