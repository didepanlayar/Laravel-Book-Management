@extends('layouts.global')

@section('title') Edit User @endsection 

@section('content')
    <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <form action="{{route('users.update', [$user->id])}}" method="POST" class="bg-white shadow-sm p-3" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <label for="name">Name</label>
            <input value="{{old('name') ? old('name') : $user->name}}" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name" type="text" name="name" id="name" />
            <div class="invalid-feedback">{{$errors->first('name')}}</div>
            <br>
            <label for="username">Username</label>
            <input value="{{$user->username}}" disabled class="form-control" placeholder="username" type="text" name="username" id="username" />
            <br>
            <label for="">Status</label>
            <br>
            <input {{$user->status == 'Active' ? 'checked' : ''}} value="Active" type="radio" class="form-control" id="active" name="status">
            <label for="active">Active</label>
            <input {{$user->status == 'Inactive' ? 'checked' : ''}} value="Inactive" type="radio" class="form-control" id="inactive" name="status">
            <label for="inactive">Inactive</label>
            <br><br>
            <label for="">Roles</label>
            <br>
            <input class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" {{in_array('Administrator', json_decode($user->roles)) ? 'checked' : ''}} name="roles[]" id="Administrator" value="Administrator">
            <label for="Administrator">Administrator</label>
            <input class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" {{in_array('Staff', json_decode($user->roles)) ? 'checked' : ''}} name="roles[]" id="Staff" value="Staff">
            <label for="Staff">Staff</label>
            <input class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" {{in_array('Customer', json_decode($user->roles)) ? 'checked' : ''}} name="roles[]" id="Customer" value="Customer">
            <label for="Customer">Customer</label>
            <div class="invalid-feedback">{{$errors->first('roles')}}</div>
            <br>
            <br>
            <label for="phone">Phone number</label>
            <br>
            <input type="text" name="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}" value="{{old('phone') ? old('phone') : $user->phone}}">
            <div class="invalid-feedback">{{$errors->first('phone')}}</div>
            <br>
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">{{old('address') ? old('address') : $user->address}}</textarea>
            <div class="invalid-feedback">{{$errors->first('address')}}</div>
            <br>
            <label for="avatar">Avatar image</label>
            <br>
            Current avatar: <br>
            @if($user->avatar)
                <img src="{{asset('storage/'.$user->avatar)}}" width="120px" />
                <br>
            @else
                N/A
            @endif
            <br>
            <input id="avatar" name="avatar" type="file" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
            <hr class="my-3">
            <label for="email">Email</label>
            <input value="{{$user->email}}" disabled class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" placeholder="user@mail.com" type="text" name="email" id="email" />
            <div class="invalid-feedback">{{$errors->first('email')}}</div>
            <br>
            <input class="btn btn-primary" type="submit" value="Save" />
        </form>
    </div>
@endsection 