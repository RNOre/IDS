<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\IndexRequest;
use App\Models\AverageBall;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Models\StudentGroupRegistration;

class StudentController extends Controller
{
    public function index()
    {
        $students = $this->service->index();

        return response()->json($students);
    }


    public function show($id)
    {
        $student = $this->service->show($id);

        return response()->json($student);
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        return response(200);
    }
}
