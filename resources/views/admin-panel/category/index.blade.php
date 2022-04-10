@extends('admin-panel.master')
@section('title', 'category index')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">Category</div>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('admin/categories/create')}}" class="btn btn-primary btn-sm float-right mb-3">
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                            </thead>
                            @foreach($categories as $category)
                                <tbody>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <form action="{{ url('admin/categories/'.$category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                                </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
            <div class="card-footer">
               {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
