<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AverageBall;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Models\StudentGroupRegistration;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        if (isset($students)) {
            return request()->json($students);
        }else{
            return request();
        }
    }

    public function show($id)
    {
        $student = Student::find($id);
//        $student = Student::all();
        $balls=[];
        foreach ($student->indivAchivBall as $indivAchivBall) {
            $indivAchivBallValue=$indivAchivBall->value;
            $indivAchivBallDate=$indivAchivBall->date;
            $typeIndivAchivName=$indivAchivBall->typeIndivAchiv->name;
            $Ball=['value'=>$indivAchivBallValue, 'date'=>$indivAchivBallDate,'name'=> $typeIndivAchivName];
            array_push($balls, $Ball);
        }
        $response = ['value' => $student->value, 'balls'=>$balls];

        return response()->json($response);
    }


}
