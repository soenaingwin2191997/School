@extends('school/master')
@section('school')

<div class="col p-2">
    <h3 class="text-center mb-4">Add Teacher</h3>
    <div class="col d-flex justify-content-center">
        <form method="POST" action="{{ url('add/teacher') }}" class="col-6">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Teacher Name</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="fatherName">Father Name</label>
                <input class="form-control" type="text" name="father_name" id="fatherName">
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control" type="number" name="phone" id="phone">
            </div>
            <div class="mb-3">
                <label class="form-label" for="gender">Gender</label>
                <select class="form-select" name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="degree" class="form-lab">Degree</label>
                <input type="text" name="degree" id="degree" class="form-control">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" name="position" id="position" class="form-control">
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label" for="towhship">Towhship</label>
                <input id="townshipInput" class="form-control" type="text" name="township">
                <div class="position-absolute d-flex justify-content-center w-100">
                    <ul id="township" style="display:none;" class="list-group w-100">
                        {{-- Ajax Data --}}
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <div class="mb-3 text-end">
                <button class="btn bg-dark text-white" type="submit">Save</button>
                <button class="btn bg-dark text-white" type="button">Clear</button>
            </div>
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