@extends('admin-panel.master')
@section('title', 'Category Update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Category Update form</h5>
                <form action="{{url('admin/categories/'.$category->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter category name" value="{{ $category->name }}">
                        @error('name')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
