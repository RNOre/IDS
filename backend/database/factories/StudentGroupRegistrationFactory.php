<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentGroupRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enrollmentDate'=>$this->faker->date,
            'deductionDate'=>$this->faker->date,
            'student_id'=>Student::get()->random()->id,
            'student_group_id'=>StudentGroup::get()->random()->id,
        ];
    }
}
