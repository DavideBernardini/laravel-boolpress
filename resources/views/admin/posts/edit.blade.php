@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add a new post</div>

                <div class="card-body">

                    <form action="{{route("admin.posts.update", $post["id"])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{$post["title"]}}" placeholder="Add a title">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                                id="author" value="{{$post["author"]}}" placeholder="Write the author's name">
                            @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                id="content" cols="30" rows="10"
                                placeholder="Add the content of the new post">{{$post["content"]}}</textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="" selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                    <option {{old("category_id")!= null && old("category_id") == $category["id"] || isset($post["category"]) && $post["category"]["id"] == $category["id"] ? 'selected' : null}} value="{{$category["id"]}}">{{$category["name"]}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
