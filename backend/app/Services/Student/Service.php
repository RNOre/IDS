<?php

namespace App\Services\Student;

use App\Models\Student;
use Illuminate\Support\Facades\DB;

class Service
{
    public function index()
    {
        $students = Student::all();

        $data = [];

        $studentData = ['id' => '', 'value' => ''];

        foreach ($students as $student) {
            $studentData['id'] = $student->id;
            $studentData['value'] = $student->value;
            array_push($data, $studentData);
        }

        return $data;
    }

    public function show($student)
    {

        $balls = [];
        $groups = [];

        foreach ($student->studentGroupRegistration as $groupRegistration) {
            $groupItem = ['name' => $groupRegistration->studentGroup->name, 'EI' => $groupRegistration->studentGroup->educInst->name,
                'ed' => $groupRegistration->enrollmentDate, 'dd' => $groupRegistration->deductionDate];
            array_push($groups, $groupItem);
        }

        foreach ($student->indivAchivBall as $indivAchivBall) {
            $ballItem = ['value' => $indivAchivBall->value, 'date' => $indivAchivBall->date,
                'type' => $indivAchivBall->typeIndivAchiv->name];
            array_push($balls, $ballItem);
        }

        $response = ['value' => $student->value, 'groups' => $groups, 'balls' => $balls];

        return $response;
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
    }
}
