@extends('layouts.dashboard_master')

@section('home')
active
@endsection
@section('content')

    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
    </nav>

    <div class="sl-pagebody">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            <h3>Dashboard</h3>
                        </div>
        
                        <div class="card-body bg-light">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
        
                            <h2>Welcome:{{Auth::user()->name}}</h2>
                            <h3>Email: {{Auth::user()->email}}</h3>
                            <h3>Created date:{{Auth::user()->created_at}}</h3>
        
        
                        </div>
                    </div>
                </div>
        
            </div>
        
            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-warning text-light">
                        <h3>User list - {{$total}}</h3>
                           
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <th >{{$loop->index + $users->firstItem()}}</th>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        {{$user->created_at->format('d-m-Y h:i:s A')}}
                                        <br>
                                        {{$user->created_at->diffForHumans()}}</td>
                                        
                                      </tr>
                                     
                                    @endforeach
                                
                                </tbody>
                              </table>
                              {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
    </div><!-- sl-pagebody -->


@endsection
