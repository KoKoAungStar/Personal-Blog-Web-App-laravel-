@extends('admin-panel.master')
@section('title', 'skill index')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">Projects</div>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm float-right mb-3">
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
                            <th>url</th>
                            <th>Action</th>
                            </thead>
                            @foreach($projects as $project)
                                <tbody>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->url }}</td>
                                <td>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
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
{{--                {{ $skills->links() }}--}}
            </div>
        </div>
    </div>
@endsection
