@extends("layouts.global")

@section("title") Users List @endsection 

@section("content")
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('users.index')}}">
                <div class="input-group mb-3">
                    <input class="form-control col-md-10" type="text" name="keyword" value="{{Request::get('keyword')}}" placeholder="Search by email..." />
                    <div class="input-group-append">
                        <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Username</b></th>
                <th><b>Email</b></th>
                <th><center><b>Avatar</b></center></th>
                <th><center><b>Action</b></center></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <center>
                    @if($user->avatar)
                        <img src="{{asset('storage/'.$user->avatar)}}" width="70px" />
                    @else
                        N/A
                    @endif
                    </center>
                </td>
                <td>
                    <center>
                    <a class="btn btn-primary btn-sm" href="{{route('users.show', [$user->id])}}">Detail</a>
                    <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', [$user->id])}}">Edit</a>
                    <form action="{{route('users.destroy', [$user->id])}}" method="POST" onsubmit="return confirm('Delete this user permanently?')" class="d-inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                    </form>
                    </center>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection