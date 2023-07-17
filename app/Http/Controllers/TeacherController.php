<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function teacherPage(){
        $teachers=Teacher::orderBy('id','DESC')->get();
        return view('school.teacher',['teachers'=>$teachers]);
    }

    function addTeacherPage(){
        return view('school.add-teacher');
    }

    function addTeacher(Request $request){
        $data=$this->teacherData($request);
        Teacher::insert($data);
        return redirect()->back();
    }

    // UPdate Update Page ///////////////////////
    function teacherUpdatePage(Request $request){
        $teacher=Teacher::where('id',$request->id)->get()->toArray();
        return view('school.edit-teacher',['teacher'=>$teacher]);
    }

    // Update Teacher ////////////////////////
    function teacherUpdate(Request $request){
        $data=$this->teacherData($request);
        Teacher::where('id',$request->id)->update($data);
        return redirect()->back();
    }

    // Search Teacher ///////////////////////
    function searchTeacher(Request $request){
        $teachers=Teacher::where('name','like',"%{$request->searchKey}%")
        ->orderBy('id','DESC')->get();
        return view('school.teacher',['teachers'=>$teachers]);
    }

    // teacher Data ///////////////
    private function teacherData($data){
        return [
            'name'=>$data->name,
            'father_name'=>$data->father_name,
            'phone'=>$data->phone,
            'gender'=>$data->gender,
            'degree'=>$data->degree,
            'position'=>$data->position,
            'township'=>$data->township,
            'address'=>$data->address,
        ];
    }
}
