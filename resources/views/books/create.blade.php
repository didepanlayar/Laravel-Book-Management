@extends('layouts.global')

@section('title') Create Book @endsection 

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
                @csrf
                <label for="title">Title</label>
                <br>
                <input type="text" class="form-control {{$errors->first('title') ? "is-invalid" : ""}}" name="title" value="{{old('title')}}" placeholder="Book Title">
                <div class="invalid-feedback">{{$errors->first('title')}}</div>
                <br>
                <label for="cover">Cover</label>
                <input type="file" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" name="cover">
                <div class="invalid-feedback">{{$errors->first('cover')}}</div>
                <br>
                <label for="description">Description</label>
                <br>
                <textarea name="description" id="description" class="form-control {{$errors->first('description') ? "is-invalid" : ""}}" placeholder="Give a description about this book">{{old('description')}}</textarea>
                <div class="invalid-feedback">{{$errors->first('description')}}</div>
                <br>
                <label for="categories">Categories</label>
                <br>
                <select name="categories[]" multiple id="categories" class="form-control"></select>
                <br>
                <br>
                <label for="stock">Stock</label>
                <br>
                <input type="number" class="form-control {{$errors->first('stock') ? "is-invalid" : ""}}" id="stock" name="stock" value="{{old('stock')}}" min=0 value=0>
                <div class="invalid-feedback">{{$errors->first('stock')}}</div>
                <br>
                <label for="author">Author</label>
                <br>
                <input type="text" class="form-control {{$errors->first('author') ? "is-invalid" : ""}}" name="author" id="author" value="{{old('author')}}" placeholder="Book Author">
                <div class="invalid-feedback">{{$errors->first('author')}}</div>
                <br>
                <label for="publisher">Publisher</label>
                <br>
                <input type="text" class="form-control {{$errors->first('publisher') ? "is-invalid" : ""}}" id="publisher" name="publisher" value="{{old('publisher')}}" placeholder="Book Publisher">
                <div class="invalid-feedback">{{$errors->first('publisher')}}</div>
                <br>
                <label for="Price">Price</label>
                <div class="invalid-feedback">{{$errors->first('price')}}</div>
                <br>
                <input type="number" class="form-control {{$errors->first('price') ? "is-invalid" : ""}}" name="price" id="price" value="{{old('price')}}" placeholder="Book Price">
                <br>
                <button class="btn btn-primary" name="save_action" value="Publish">Publish</button>
                <button class="btn btn-secondary" name="save_action" value="Draft">Save as Draft</button>
            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#categories').select2({
            ajax: {
                url: 'http://book.laravel.org/ajax/categories/search',
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            }
                        })
                    }
                }
            }
        });
    </script>
@endsection