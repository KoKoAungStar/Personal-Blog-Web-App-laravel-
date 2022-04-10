@extends('admin-panel.master')
@section('title', 'Post index')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">Category</div>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('admin/posts/create')}}" class="btn btn-primary btn-sm float-right mb-3">
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
                        @if($comments->count() <1)
                                No comments yet
                            @else
                        <table class="table table-bordered table-hover">
                            <thead>
                            <th>comment</th>
                            </thead>
                            <tbody></tbody>
                                @foreach($comments as $index=>$comment)
                                    <tbody>
                                        <td>{{ $index+1 }}</td>
                                    <td>{{$comment->text}}</td>
                                    <td>
                                        <form action="{{ url('admin/comment/'.$comment->id.'/show_hide') }}" method="POST">
                                            @csrf
                                            @if($comment->status == "show")
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Hide</button>
                                            @else
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Show</button>
                                            @endif
                                        </form>
                                    </td>
                                    </tbody>
                                @endforeach
                            @endif
                        </table>

                    </div>
                </div>
            </div>
            <div class="card-footer">
               {{-- {{ $categories->links() }} --}}
            </div>
        </div>
    </div>
@endsection
