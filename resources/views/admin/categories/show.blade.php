@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h1>{{$category["name"]}}</h1>
                    <h5>Slug: {{$category["slug"]}}</h5>
                </div>
                 <h4 class="pl-4">Posts with this category:</h4>
                 <ol>
                     @forelse ($category["posts"] as $post)
                    <li>
                        <a href="{{route("admin.posts.show", $post["id"])}}">
                            {{$post['title']}}</li>
                        </a>
                    </li>
                    @empty
                    <h5>There are 0 posts with this category</h5>
                    @endforelse
                 </ul>
            </div>
        </div>
    </div>
</div>
</div>
@endsection