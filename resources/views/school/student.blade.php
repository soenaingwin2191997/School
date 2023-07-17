@extends('school/master')
@section('school')
    <div class="col p-2">
        <h3 class="text-center mt-3 mb-5">Students Form</h3>
        <div class="mb-1">
            <form action="{{ url('search/student') }}" method="get">
                @csrf
                <div class="d-flex col flex-wrap">
                    <div class="col-12 col-md-6 col-lg-3 p-1">
                        <input class="form-control" type="text" value="{{ request('student_name') }}" placeholder="Student Name" name="student_name">
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 p-1">
                        <select class="form-select" name="class_id">
                            <option value="">All Class</option>
                            @foreach ($class as $c)
                                <option value="{{ $c->id }}" {{ $c->id==request('class_id')? "selected":"" }}>{{ $c->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 p-1">
                        <select class="form-select" name="grade_id">
                            <option value="0">All Grade</option>
                            @foreach ($grade as $g)
                                <option value="{{ $g->id }}" {{ $g->id==request('grade_id')? "selected":"" }}>{{ $g->grade_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 p-1">
                        <select class="form-select" name="township">
                            <option value="0">All Township</option>
                            @foreach ($township as $t)
                                <option value="{{ $t->township }}" {{ $t->township==request('township')? "selected": "" }}>{{ $t->township }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-end me-1 mt-2">
                    <a href="{{ url('student/form') }}" class="btn bg-dark text-white">Search All</a>
                    <button class="btn bg-dark text-white" type="submit">Search</button>
                </div>
            </form>
        </div>
        <a class="btn btn-success mb-2" href="{{ url('add/student/form') }}">
            Add Student
        </a>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Father Name</td>
                    <td>DOB</td>
                    <td>Gender</td>
                    <td>Class</td>
                    <td>Grade</td>
                    <td>Township</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->father_name }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->class_name }}</td>
                        <td>{{ $student->grade_name }}</td>
                        <td>{{ $student->township }}</td>
                        <td>
                            <a title="Edit" href="{{ url("student/edit",$student->student_id) }}"><i class="fa-solid fa-eye text-info"></i></a> | 
                            <a title="Delete" href="{{ url("student/delete",$student->student_id) }}"><i class="fa-solid fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection