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
                        <table class="table table-bordered table-hover">
                            <thead>
                            <th>No</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                            </thead>
                            @foreach($posts as $index=>$post)
                                <tbody>
                                <td>{{$index+1}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                    <img src="{{ asset('storage/post-images/'.$post->image)}}" alt="" width="100px">
                                </td>
                                <td>{{$post->title}}</td>
                                <td><textarea>{{$post->content}}</textarea></td>
                                <td>
                                    <form action="{{ url('admin/posts/'.$post->id) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <a href="{{ url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</button>
                                        <a href="{{ url('admin/posts/'.$post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-comments"></i>Comment</a>
                                    </form>
                                </td>
                                </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
            <div class="card-footer">
               {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
