@extends('layouts.guest')

@section('pageContent')

<div class="row">
    <div class="col-md-8 blog-main">
        <h1 class="blog-post-title">{{$category['name']}}</h1>
        @if (count($category["posts"]) > 0)
        <h4 class="pt-3">Others posts with this category:</h4>
        <ul class="pl-0 pt-3 list-unstyled"> 
            @foreach ($category["posts"] as $post)
            <li class="pb-2"><a href="{{route("posts.show", $post["slug"])}}">{{$post["title"]}}</a></li>
            @endforeach
        </ul>
        @endif

        <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary mt-3">Homepage</a>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur
                purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>

        <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
                <li><a href="#">March 2014</a></li>
                <li><a href="#">February 2014</a></li>
                <li><a href="#">January 2014</a></li>
            </ol>
        </div>

        <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ol>
        </div>
    </aside><!-- /.blog-sidebar -->

</div><!-- /.row -->

@endsection
