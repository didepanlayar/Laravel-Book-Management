@extends('layouts.global')

@section('title') Category Trashed @endsection

@section('content')
    @if(session('status'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    {{session('status')}}
                </div>
            </div>
        </div>
    @endif 
    <div class="row mb-3">
        {{-- <div class="col-md-6">
            <a href="{{route('categories.create')}}" class="btn btn-primary">Create Category</a>
        </div> --}}
        <div class="col-md-6">
            <form action="{{route('categories.index')}}">
                <div class="input-group">
                    <input class="form-control" type="text" name="name" placeholder="Search by category name..." />
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-primary" value="Filter">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">Published</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('categories.trash')}}">Trash</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Slug</b></th>
                        <th><center><b>Image</b></center></th>
                        <th><center><b>Actions</b></center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <center>
                                @if($category->image)
                                    <img src="{{asset('storage/' . $category->image)}}" width="48px" />
                                @else
                                    No Image
                                @endif
                            </center>
                        </td>
                        <td>
                            <center>
                                [TODO: Action]
                            </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colSpan="10">
                            {{$categories->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection