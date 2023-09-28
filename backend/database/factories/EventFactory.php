<?php

namespace Database\Factories;

use App\Models\EducInst;
use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word,
            'educ_inst_id'=>EducInst::get()->random()->id,
            'level_id'=>Level::get()->random()->id
        ];
    }
}
