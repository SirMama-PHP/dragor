@extends('layouts.dashboard_master')
@section('category')
active
@endsection
@section( 'content')

<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{route('home')}}">Home</a>
    <li class="breadcrumb-item"><a href="{{url('/add_category')}}">Add Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$category_name}}</li>
</nav>

<div class="sl-pagebody">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-primary text-light ">
                    <h4>update Category</h4>
                </div>

                <div class="card-body bg-light">
                    <form action="{{url('/update/category/post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="category_id" value="{{$category_id}}">
                            <label for="category font-weight-bold"> Category Name</label>
                            <input type="text" name='category_name' class="form-control" id="category"
                                value="{{$category_name}}">
                            <span class="text-danger">
                                @error('category_name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                        <label> Category Photo</label>
                        <img class="form-group" width="200" src="{{asset('uploads/category_photo')}}/{{$category_photo}}"   alt="{{$category_photo}}">
                        </div>
                        <div class="form-group">
                        <label>New Category Photo</label>
                        <input type="file" name="new_category_photo">
                        </div>

                        <button type="submit" class="btn btn-success "> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- sl-pagebody -->
@endsection
