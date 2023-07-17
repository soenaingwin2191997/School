<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use App\Models\StudentGrade;
use App\Models\Township;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard(){
        $grade=StudentGrade::all();
        $class=StudentClass::all();
        $township=Township::all();
        return view('school.dashboard',['grade'=>$grade,'class'=>$class,'township'=>$township]);
    }
}
