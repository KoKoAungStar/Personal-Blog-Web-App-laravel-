@extends('admin-panel.master')
@section('title', 'Post create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Post Create form</h5>
                <form action="{{url('admin/posts') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label><br>
                        <input type="file" name="image" class="@error('image') is-invalid @enderror">
                        @error('image')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title" value="{{ old('title') }}">
                        @error('title')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" id="content" rows="3" class="form-control @error('content') is-invalid @enderror" placeholder="Message..."></textarea>
                        @error('content')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection