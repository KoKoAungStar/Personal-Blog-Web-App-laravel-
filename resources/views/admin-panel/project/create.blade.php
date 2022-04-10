@extends('admin-panel.master')
@section('title', 'skill create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Project Create form</h5>
                <form action="{{ route('projects.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter project name" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL</label>
                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter project url" value="{{ old('url') }}">
                        @error('url')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
