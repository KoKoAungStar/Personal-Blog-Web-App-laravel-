@extends('admin-panel.master')
@section('title', 'skill edit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Project Update form</h5>
                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Project Name" value="{{ $project->name ?? old('name') }}">
                        @error('name')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL</label>
                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter Project url" value="{{ $project->url ?? old('url') }}">
                        @error('percent')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

