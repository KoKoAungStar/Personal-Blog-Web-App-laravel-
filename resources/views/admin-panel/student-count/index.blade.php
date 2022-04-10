@extends('admin-panel.master')
@section('title', 'student count index')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">Student Count</div>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-primary btn-sm float-right mb-3">
                            <i class="fa fa-plus-circle"></i>
                            Add new</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <div>{{ Session('successMsg')  }}</div>
                                <button class="close" data-dismiss="alert">&times</button>
                            </div>
                        @endif
                        @if($student_count->count() < 1)
                        <form action="{{ url('admin\student-counts\store') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="number" name="count" class="form-control" style="border-radius:4px 0px 0px 4px" @error('count') @enderror>
                                <br>
                                <div>
                                @error('count')
                                <small> {{ $message}} </small>
                                @enderror
                            </div>    
                            </div>
                        </form>
                        @endif
                        <br>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <th>count</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @if($student)
                                <tr>
                                <td>{{$student->count}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" id="addBtn"><i class="fa fa-plus-circle"></i> Add more Student</button>
                                    <form action="{{ url('admin/student-counts/'.$student->id.'/update') }}" class="col-md-6" style="display: none" id="addForm" method="POST">
                                        @csrf
                                        <div class=" input-group">
                                            <input type="number" name="count" required class="form-control @error('count') is-invalid @enderror" style="border-radius: 4px 0px 0px 4px"
                                            placeholder="Enter student count">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 0px 4px 4px 0px">Add</button>
                                        </div>
                                        @error('count')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </form>
                                </td>
                                @endif
                                </tr>
                                </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="card-footer">
<!-- {{--                {{ $skills->links() }}--}} -->
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $("#addBtn").click(function(){
            $('#addForm').css('display', 'block');
            $(this).css('display', 'none');
        });
    });
</script>
@endsection