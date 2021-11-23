@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h1>{{$post["title"]}}</h1>
                    <h5>{{$post["author"]}}</h5>
                    <p>{{$post["content"]}}</p>
                    <a href="{{route("admin.categories.show", $post["category"]["id"])}}">{{$post["category"]["name"]}}</a>
                    <div class="mt-3">
                    @if(count($post["tags"]) > 0)
                        <span class="pr-1">Tags:</span>
                        @foreach ($post["tags"] as $tag)
                        <span class="badge badge-primary">{{$tag["name"]}}</span>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection