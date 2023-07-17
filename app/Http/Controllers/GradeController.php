<?php

namespace App\Http\Controllers;

use App\Models\StudentGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    function addGrade(Request $request){
        StudentGrade::insert([
            'grade_name'=>$request->grade,
        ]);
        return redirect()->back();
    }
}
