<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    function addClass(Request $request){
        StudentClass::insert([
            'class_name'=>$request->class,
        ]);
        return redirect()->back();
    }
}
