@extends('layouts.global')

@section('title') Books Trashed @endsection 

@section('content') 
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{route('books.create')}}" class="btn btn-primary">Create Book</a>
                </div>
            </div>
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th><center><b>Cover</b></center></th>
                        <th><b>Title</b></th>
                        <th><b>Author</b></th>
                        <th><b><center>Status</center></b></th>
                        <th><b>Categories</b></th>
                        <th><b>Stock</b></th>
                        <th><b>Price</b></th>
                        <th><center><b>Action</b></center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>
                            @if($book->cover)
                                <center><img src="{{asset('storage/' . $book->cover)}}" width="96px" /></center>
                            @endif
                        </td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>
                            @if($book->status == "Draft")
                                <center><span class="badge bg-dark text-white">{{$book->status}}</span></center>
                            @else
                                <center><span class="badge badge-success">{{$book->status}}</span></center>
                            @endif
                        </td>
                        <td>
                            <ul class="pl-3">
                                @foreach($book->categories as $category)
                                <li>{{$category->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$book->stock}}</td>
                        <td>{{$book->price}}</td>
                        <td>
                            <center>
                                [TODO: Actions]
                            </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">
                            {{$books->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection