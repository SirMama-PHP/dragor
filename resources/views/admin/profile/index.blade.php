@extends('layouts.dashboard_master')

@section('content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
    <a class="breadcrumb-item" href="#">Edit Profile</a>
</nav>

<div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (session('S_massage'))
                <div class="alert alert-success" role="alert">
                    {{ session('S_massage') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-header bg-primary text-light ">
                        <h5>profile name update </h5>
                    </div>

                    <div class="card-body bg-light">
                        <form action="{{url('profile/post')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name font-weight-bold"> Profile Name</label>
                                <input type="text" name='name' class="form-control" id="name"
                                    value="{{Auth::user()->name}}">
                                <span class="text-danger">
                                    @error('name')
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

        <div class="row justify-content-center mt-3 ">
            <div class="col-md-5">
                {{-- @if($errors->all())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
            </div>
            @endif --}}
            @if(session('password_status'))
            <div class="alert alert-success">
                {{session('password_status')}}
            </div>
            @endif
            @if(session('database_status'))
            <div class="alert alert-danger">
                {{session('database_status')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header bg-warning text-light ">
                    <h5>Change Password </h5>
                </div>

                <div class="card-body bg-light">
                    <form action="{{url('password/post')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name font-weight-bold">Old Password</label>
                            <input type="text" name='old_password' class="form-control" id="name">
                            <span class="text-danger">
                                @error('old_password')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="name font-weight-bold"> New Password</label>
                            <input type="text" name='password' class="form-control" id="name">
                            <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="name font-weight-bold"> Confirm Password</label>
                            <input type="text" name='password_confirmation' class="form-control" id="name">
                            <span class="text-danger">
                                @error('password_confirmation')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <button type="submit" class="btn btn-secondary "> Change Passwrod</button>
                    </form>
                </div>
            </div>
        </div>
</div>
</div><!-- sl-pagebody -->
@endsection
