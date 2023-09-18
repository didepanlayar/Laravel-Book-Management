@extends('layouts.global')

@section('title') Detail User @endsection 

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if($user->avatar)
                    <img src="{{asset('storage/'. $user->avatar)}}" width="128px" />
                @else
                    N/A
                @endif
                <br>
                <br>
                <b>Name:</b>
                <br>
                {{$user->name}}
                <br>
                <br>
                <b>Username:</b><br>
                {{$user->email}}
                <br>
                <br>
                <b>Phone number</b>
                <br>
                {{$user->phone}}
                <br>
                <br>
                <b>Address</b>
                <br>
                {{$user->address}}
                <br>
                <br>
                <b>Roles:</b>
                <br>
                @foreach (json_decode($user->roles) as $role)
                    &middot; {{$role}} <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection