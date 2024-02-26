@extends('layouts.global')

@section('title') Edit Book @endsection 

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{route('books.update', [$book->id])}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <label for="title">Title</label>
                <br>
                <input type="text" class="form-control {{$errors->first('title') ? "is-invalid" : ""}}" name="title" value="{{old('title') ? old('title') : $book->title}}" placeholder="Book Title">
                <div class="invalid-feedback">{{$errors->first('title')}}</div>
                <br>
                <label for="cover">Cover</label>
                <br>
                <small class="text-muted">Current cover</small>
                <br>
                @if($book->cover)
                    <img src="{{asset('storage/' . $book->cover)}}" width="96px"/>
                @endif
                <br>
                <br>
                <input type="file" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" name="cover">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
                <br>
                <br>
                <label for="slug">Slug</label><br>
                <input type="text" class="form-control {{$errors->first('slug') ? "is-invalid" : ""}}"  name="slug" value="{{old('slug') ? old('slug') : $book->slug}}" placeholder="enter-a-slug"/>
                <div class="invalid-feedback">{{$errors->first('slug')}}</div>
                <br>
                <label for="description">Description</label>
                <br>
                <textarea name="description" id="description" class="form-control {{$errors->first('description') ? "is-invalid" : ""}}">{{old('description') ? old('description') : $book->description}}</textarea>
                <div class="invalid-feedback">{{$errors->first('description')}}</div>
                <br>
                <label for="categories">Categories</label>
                <br>
                <select name="categories[]" multiple id="categories" class="form-control"></select>
                <br>
                <br>
                <label for="stock">Stock</label>
                <br>
                <input type="number" class="form-control {{$errors->first('stock') ? "is-invalid" : ""}}" id="stock" name="stock" value="{{old('stock') ? old('stock') : $book->stock}}" placeholder="Stock">
                <div class="invalid-feedback">{{$errors->first('stock')}}</div>
                <br>
                <label for="author">Author</label>
                <br>
                <input type="text" class="form-control {{$errors->first('author') ? "is-invalid" : ""}}" name="author" id="author" value="{{old('author') ? old('author') : $book->author}}" placeholder="Book Author">
                <div class="invalid-feedback">{{$errors->first('author')}}</div>
                <br>
                <label for="publisher">Publisher</label>
                <br>
                <input type="text" class="form-control {{$errors->first('publisher') ? "is-invalid" : ""}}" id="publisher" name="publisher" value="{{old('publisher') ? old('publisher') : $book->publisher}}" placeholder="Book Publisher">
                <div class="invalid-feedback">{{$errors->first('publisher')}}</div>
                <br>
                <label for="Price">Price</label>
                <br>
                <input type="number" class="form-control {{$errors->first('price') ? "is-invalid" : ""}}" name="price" id="price" value="{{old('price') ? old('price') : $book->price}}" placeholder="Book Price">
                <div class="invalid-feedback">{{$errors->first('price')}}</div>
                <br>
                <label for="">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{$book->status == 'Publish' ? 'selected' : ''}} value="Publish">Publish</option>
                    <option {{$book->status == 'Draft' ? 'selected' : ''}} value="Draft">Draft</option>
                </select>
                <br>
                <button class="btn btn-primary" name="save_action" value="Publish">Update</button>
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

        var categories = {!! $book->categories !!}
        categories.forEach(function(category) {
            var option = new Option(category.name, category.id, true, true);
            $('#categories').append(option).trigger('change');
        });
    </script>
@endsection