@extends('admin-panel.master')
@section('title', 'skill create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Skill Create form</h5>
                <form action="{{ url('admin/skills') }}" method="POSt">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter skill name" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger"><small>{{$message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Percent</label>
                        <input type="text" name="percent" class="form-control @error('percent') is-invalid @enderror" placeholder="Enter skill percent" value="{{ old('percent') }}">
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
