@extends('admin-panel.master')
@section('title', 'Post update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Post Update form</h5>
                <form action="{{url('admin/posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                    @method('POST') @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ $post->category_id == $category->id ? 'selected' : ''}}
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label><br>
                        <input type="file" name="image" class="@error('image') is-invalid @enderror" class="mb-3">
                        <br>
                        <img class="mt-3" src="{{ asset('storage/post-images/'.$post->image)}}" alt="" width="100px" style="border: 1px solid gray">
                        @error('image')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title" value="{{ old('title') ?? $post->title}}">
                        @error('title')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" id="content" rows="3" class="form-control @error('content') is-invalid @enderror" placeholder="Message...">{{old('content') ?? $post->content}}</textarea>
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