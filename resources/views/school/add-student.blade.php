@extends('school/master')
@section('school')

<div class="col p-2">
    <h3 class="text-center mb-4">Add Student</h3>
    <div class="col d-flex justify-content-center">
        <form method="POST" action="{{ url('add/student') }}" class="col-6">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Student Name</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="fatherName">Father Name</label>
                <input class="form-control" type="text" name="father_name" id="fatherName" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="dob">Date Of Birth</label>
                <input class="form-control" type="date" name="dob" id="dob" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="gender">Gender</label>
                <select class="form-select" name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="class">Class</label>
                <select class="form-select" name="class_id" id="class">
                    <option value="0">Select Class</option>
                    @foreach ($class as $c)
                        <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="grade">grade</label>
                <select class="form-select" name="grade_id" id="grade">
                    <option value="0">Select Grade</option>
                    @foreach ($grade as $g)
                        <option value="{{ $g->id }}">{{ $g->grade_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="towhship">Towhship</label>
                <input id="townshipInput" class="form-control" type="text" name="township" required>
                <div class="position-absolute d-flex justify-content-center w-100">
                    <ul id="township" style="display:none;" class="list-group w-100">
                        {{-- Ajax Data --}}
                    </ul>
                </div>
            </div>
            <button class="btn bg-dark text-white" type="submit">Save</button>
            <button class="btn bg-dark text-white" type="button">Clear</button>
        </form>
    </div>
</div>

@endsection

@section('schoolJs')
    <script>
        $(document).ready(function(){
            $('#townshipInput').keyup(function(){
                $data=$(this).val();
                if($('#townshipInput').val()!=''){
                    $('#township').css('display', 'block');
                       addTownship($data);

                }else{
                    $('#township').css('display','none');
                }
            });

            $(document).on('click','#township li',function(){
                $val=$(this).text();
                $('#townshipInput').val($val);
                $('#township').css('display', 'none');
            });

            $('body').click(function(){
                $('#township').css('display', 'none');
            })

            function addTownship($data){
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/search/township') }}",
                    dataType:"json",
                    data:{
                        'data':$data,
                    },
                    success:function(response){
                        $list='';
                        for($i=0; $i<response.length; $i++){
                            $list+=`
                                <li class="list-group-item list-group-item-action">${response[$i]['township']}</li>
                            `;
                        }
                        $('#township').html($list);
                    }
                });
             }
        });
    </script>
@endsection