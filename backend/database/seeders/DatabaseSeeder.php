<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AverageBall;
use App\Models\EducInst;
use App\Models\Event;
use App\Models\IndivAchivBall;
use App\Models\Level;
use App\Models\PartificationFact;
use App\Models\Scale;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Models\StudentGroupRegistration;
use App\Models\TypeIndivAchiv;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::factory(20)->create();
        AverageBall::factory(10)->create();
        TypeIndivAchiv::factory(10)->create();
        IndivAchivBall::factory(10)->create();
        EducInst::factory(2)->create();
        StudentGroup::factory(5)->create();
        StudentGroupRegistration::factory(10)->create();
        Level::factory(5)->create();
        Scale::factory(5)->create();
        Event::factory(5)->create();
        PartificationFact::factory(5)->create();
    }
}
