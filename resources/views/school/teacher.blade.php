@extends('school/master')
@section('school')
    <div class="col p-2">
        <h3 class="text-center mt-3 mb-5">Teacher Form</h3>
        <div class="mb-1 d-flex justify-content-center">
            <form action="{{ url('search/teacher') }}" method="get" class="col-12 col-md-6 col-lg-6">
                @csrf
                <div class="input-group">
                    <input class="form-control" value="{{ request("searchKey") }}" type="text" name="searchKey" id="">
                    <button class="btn btn-success">Search</button>
                </div>
            </form>
        </div>
        <a class="btn btn-success mb-2" href="{{ url('add/teacher/page') }}">
            Add Teacher
        </a>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Father Name</td>
                    <td>Phone</td>
                    <td>Gender</td>
                    <td>Degree</td>
                    <td>Position</td>
                    <td>Township</td>
                    <td>Address</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->father_name }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->gender }}</td>
                        <td>{{ $teacher->degree }}</td>
                        <td>{{ $teacher->position }}</td>
                        <td>{{ $teacher->township }}</td>
                        <td>{{ $teacher->address }}</td>
                        <td>
                            <a title="Edit" href="{{ url("teacher/update/page",$teacher->id) }}"><i class="fa-solid fa-eye text-info"></i></a> | 
                            <a title="Delete" href="{{ url("teacher/delete",$teacher->id) }}"><i class="fa-solid fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection