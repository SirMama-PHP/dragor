@extends('layouts.app')

@section( 'content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/add_category')}}">Add Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$category_name}}</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header bg-light ">
                    <h4>update Category</h4>
                </div>

                <div class="card-body bg-light">
                    <form action="{{url('/update/category/post')}}" method="post">
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

                        <button type="submit" class="btn btn-success "> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
