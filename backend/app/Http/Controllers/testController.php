<?php

namespace App\Http\Controllers;

use App\Models\AverageBall;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index()
    {
        $test=AverageBall::find(2);
        dd($test->student);
    }
}
