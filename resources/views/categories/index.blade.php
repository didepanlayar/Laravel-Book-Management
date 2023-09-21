@extends('layouts.global')

@section('title') Category List @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-6">
            <a href="{{route('categories.create')}}" class="btn btn-primary">Create Category</a>
        </div>
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
                                <a class="btn btn-primary btn-sm" href="{{route('categories.show', [$category->id])}}">Detail</a>
                                <a class="btn btn-info text-white btn-sm" href="{{route('categories.edit', [$category->id])}}">Edit</a>
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