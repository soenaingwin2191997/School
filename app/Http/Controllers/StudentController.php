<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Township;
use App\Models\StudentClass;
use App\Models\StudentGrade;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    function studentForm(){
        $students=Student::select('*','students.id as student_id')->join('student_classes','students.class_id','student_classes.id')
        ->join('student_grades','students.grade_id','student_grades.id')
        ->get();
        $grade=StudentGrade::all();
        $class=StudentClass::all();
        $township=Township::all();
        return view('school.student',[
            'students'=>$students,
            'grade'=>$grade,
            'class'=>$class,
            'township'=>$township,
        ]);
    }

    function addStudentForm(){
        $grade=StudentGrade::all();
        $class=StudentClass::all();
        return view('school.add-student',['grade'=>$grade,'class'=>$class]);
    }

    // For Add Studetn//////////////////////////////////
    function addStudetn(Request $request){
        Student::create($this->studentData($request));
        return redirect()->back();
    }

    function studentEdit($id){
        $grade=StudentGrade::all();
        $class=StudentClass::all();
        $student=Student::where('id',$id)->get()->toArray();
        return view('school.edit-student',['grade'=>$grade,'class'=>$class,'student'=>$student]);
    }

    // Delete Student ////////////////////////////////////
    function studentDelete($id){
        Student::where('id',$id)->delete();
        return redirect()->back();
    }

    // Update Student ///////////////////////////////////////
    function studentUpdate(Request $request){
        Student::where('id',$request->id)->update(
            $this->studentData($request)
        );

        return redirect('student/form');
    }

    // Search Student ////////////////////////////////////////////
    function searchStudent(Request $request){
        $students=Student::select('*','students.id as student_id')->join('student_classes','students.class_id','student_classes.id')
        ->join('student_grades','students.grade_id','student_grades.id')
        ->where('name','like',"%{$request->student_name}%")
        ->when(request('class_id'),function($query){
            $query->where('class_id',request('class_id'));
        })
        ->when(request('grade_id'),function($query){
            $query->where('grade_id',request('grade_id'));
        })
        ->when(request('township'),function($query){
            $query->where('township',request('township'));
        })
        ->get();

        $grade=StudentGrade::all();
        $class=StudentClass::all();
        $township=Township::all();
        return view('school.student',[
            'students'=>$students,
            'grade'=>$grade,
            'class'=>$class,
            'township'=>$township,
        ]);
    }

   private function studentData($request){
        return [
                'name'=>$request->name,
                'father_name'=>$request->father_name,
                'dob'=>$request->dob,
                'gender'=>$request->gender,
                'class_id'=>$request->class_id,
                'grade_id'=>$request->grade_id,
                'township'=>$request->township,
            ];
    }
}
