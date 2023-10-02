<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Student;
use App\Models\StudentGroupRegistration;
use App\Services\FuzzyAlgorithm\Fuzzy;
use App\Services\FuzzyAlgorithm\Rule;
use Illuminate\Support\Facades\DB;

class Test extends Controller
{
    public function validTest(TestRequest $request)
    {
        $validated = $request->validated();
        return response()->json($validated);
    }

    public function respTest()
    {
//        $student = Student::find(1);

//        dd($studentScore);
    }

    public function index()
    {
        if (!(request()->login && request()->password)) {
            return response()->json(['message' => 'login or pass error'], 203);
        }
        if (request()->login === 'admin' && request()->password === 'admin') {
            redirect('/adminPanel');
            return response()->json(['message' => 'correct'], 200);
        }
        return response()->json(['message' => 'wrong login or pass'], 203);
    }

    public function fuzzy()
    {
        $fuzzy1 = new Fuzzy(100, 100, 150, 200);
        $fuzzy2 = new Fuzzy(70, 30, 50, 70);
        $result1 = $fuzzy1->fuzzification();
        $result2 = $fuzzy2->fuzzification();

        $lRes = ["temp" => 0, "conclusion" => 0];
        $mRes = ["temp" => 0, "conclusion" => 0];
        $rRes = ["temp" => 0, "conclusion" => 0];

        $mRes = Rule::addRules($result1["lRes"], $result2["lRes"], $mRes);
        $lRes = Rule::addRules($result1["lRes"], $result2["mRes"], $lRes);
        $lRes = Rule::addRules($result1["lRes"], $result2["rRes"], $lRes);
        $rRes = Rule::addRules($result1["mRes"], $result2["lRes"], $rRes);
        $mRes = Rule::addRules($result1["mRes"], $result2["mRes"], $mRes);
        dd($mRes);
    }
}
