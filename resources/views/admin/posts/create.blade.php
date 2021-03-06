@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add a new post</div>

                <div class="card-body">

                    <form action="{{route("admin.posts.store")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" placeholder="Add a title" value="{{old("title")}}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                                id="author" placeholder="Write the author's name" value="{{old("author")}}">
                            @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                id="content" cols="30" rows="10"
                                placeholder="Add the content of the new post">{{old("content")}}</textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="" selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                <option {{ old("category_id") == $category["id"] ? 'selected' : null}}
                                    value="{{$category["id"]}}">{{$category["name"]}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="pb-2">Tags</div>
                            @foreach ($tags as $tag)
                            <div class="custom-control custom-checkbox">
                                <input {{in_array($tag['id'], old("tags", [])) ? "checked" : null}} name="tags[]"
                                    value="{{$tag['id']}}" type="checkbox" class="custom-control-input"
                                    id="tag-{{$tag['id']}}">
                                <label class="custom-control-label" for="tag-{{$tag['id']}}">{{$tag['name']}}</label>
                            </div>
                            @endforeach
                            @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Create</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
