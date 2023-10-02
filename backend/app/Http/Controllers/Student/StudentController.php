<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = $this->service->index();

        return response()->json($students);
    }

    public function show(Student $student)
    {
        $student = $this->service->show($student);

        return response()->json($student);
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        return response(200);
    }
}
