<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function index()
    {
        if(!(request()->login&&request()->password)){
            return response()->json(['message'=>'login or pass error'],203);
        }
        if(request()->login==='admin'&&request()->password==='admin'){
            redirect('/adminPanel');
            return response()->json(['message'=>'correct'], 200);
        }
        return response()->json(['message'=>'wrong login or pass'], 203);
    }
}
