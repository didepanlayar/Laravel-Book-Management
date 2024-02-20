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
                <input type="text" class="form-control" name="title" value="{{$book->title}}" placeholder="Book Title">
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
                <input type="file" class="form-control" name="cover">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
                <br>
                <br>
                <label for="slug">Slug</label><br>
                <input type="text" class="form-control"  name="slug" value="{{$book->slug}}" placeholder="enter-a-slug"/>
                <br>
                <label for="description">Description</label>
                <br>
                <textarea name="description" id="description" class="form-control">{{$book->description}}</textarea>
                <br>
                <label for="categories">Categories</label>
                <br>
                <select name="categories[]" multiple id="categories" class="form-control"></select>
                <br>
                <br>
                <label for="stock">Stock</label>
                <br>
                <input type="number" class="form-control" id="stock" name="stock" value="{{$book->stock}}" placeholder="Stock">
                <br>
                <label for="author">Author</label>
                <br>
                <input type="text" class="form-control" name="author" id="author" value="{{$book->author}}" placeholder="Book Author">
                <br>
                <label for="publisher">Publisher</label>
                <br>
                <input type="text" class="form-control" id="publisher" name="publisher" value="{{$book->publisher}}" placeholder="Book Publisher">
                <br>
                <label for="Price">Price</label>
                <br>
                <input type="number" class="form-control" name="price" id="price" value="{{$book->price}}" placeholder="Book Price">
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