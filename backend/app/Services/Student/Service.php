<?php

namespace App\Services\Student;

use App\Models\Student;

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

    public function show($id)
    {
        $student = Student::find($id);
        $balls = [];
        $groups = [];

        foreach ($student->studentGroupRegistration as $groupRegistration) {
            $groupED = $groupRegistration->enrollmentDate;
            $groupDD = $groupRegistration->deductionDate;
            $groupName=$groupRegistration->studentGroup->name;
            $EI=$groupRegistration->studentGroup->educInst->name;
            $Groups=['name'=>$groupName, 'EI'=>$EI, 'ed'=>$groupED, 'dd'=>$groupDD];
            array_push($groups, $Groups);
        }

        foreach ($student->indivAchivBall as $indivAchivBall) {
            $indivAchivBallValue = $indivAchivBall->value;
            $indivAchivBallDate = $indivAchivBall->date;
            $typeIndivAchivName = $indivAchivBall->typeIndivAchiv->name;
            $Ball = ['value' => $indivAchivBallValue, 'date' => $indivAchivBallDate, 'name' => $typeIndivAchivName];
            array_push($balls, $Ball);
        }
        $response = ['value' => $student->value, 'groups'=>$groups,'balls' => $balls];

        return response()->json($response);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
    }
}
