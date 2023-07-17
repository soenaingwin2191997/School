@extends('school/master')
@section('school')
    <div class="col p-2">
        <h3 class="text-center mb-5 mt-3">Dashboard</h3>
        <div class="d-flex mb-3 gap-2">
            <div class="col p-3 border rounded shadow">
                <h3 class="text-center">Total Student</h3>
            </div>
            <div class="col p-3 border rounded shadow">
                <h3 class="text-center">Total Teachers</h3>
            </div>
            <div class="col p-3 border rounded shadow">
                <h3 class="text-center">Total Class</h3>
            </div>
            <div class="col p-3 border rounded shadow">
                <h3 class="text-center">Grade</h3>
            </div>
        </div>
        <div class="col mb-3 d-flex gap-2">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Id</td>
                            <td>Grade Name</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grade as $g)
                            <tr>
                                <td>1</td>
                                <td>{{ $g->id }}</td>
                                <td>{{ $g->grade_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn bg-dark text-white"data-bs-toggle="modal" data-bs-target="#grade">Add Grade</button>
            </div>
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Id</td>
                            <td>Class Name</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($class as $c)
                            <tr>
                                <td>1</td>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->class_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn bg-dark text-white" data-bs-toggle="modal" data-bs-target="#class">Add Class</button>
            </div>
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Id</td>
                            <td>Township</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($township as $t)
                            <tr>
                                <td>1</td>
                                <td>{{ $t->id }}</td>
                                <td>{{ $t->township }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn bg-dark text-white" data-bs-toggle="modal" data-bs-target="#township">Add Township</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="grade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ url('add/grade') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Grade</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="grade">Student Grade</label>
                        <input class="form-control" type="text" name="grade" id="grade" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Grade</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="class" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ url('add/class') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="class">Student Grade</label>
                        <input class="form-control" type="text" name="class" id="class" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Class</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="township" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ url('add/township') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="township">Township</label>
                        <input class="form-control" type="text" name="township" id="township" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Class</button>
                </div>
            </form>
        </div>
    </div>
@endsection