@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">

                    @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>

                    @endif

                    <table class="table">
                        <thead>
                            <tr style="border-top: 1px solid #dee2e6">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th> 
                                <th scope="col">Category</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post["id"]}}</td>
                                <td>{{$post["title"]}}</td>
                                <td>{{$post["author"]}}</td>
                                <td>{{$post["category"]["name"] ?? ""}}</td>
                                <td>
									@if(count($post["tags"]) > 0)
										@foreach ($post["tags"] as $tag)
										<span class="badge badge-primary">{{$tag["name"]}}</span>
										@endforeach
									@endif
								</td>
                                <td>{{$post["slug"]}}</td>
                                <td>
                                    <a href="{{route("admin.posts.show", $post["id"])}}">
                                        <button type="button" class="btn btn-primary">View</button>
                                    </a>
                                    <br>
                                    <a href="{{route("admin.posts.edit", $post["id"])}}">
                                        <button type="button" class="btn btn-warning mt-1">Edit</button>
                                    </a>
                                    <br>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn_delete mt-1" data-id="{{$post["id"]}}" data-toggle="modal" data-target="#deleteModal">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to delete the post?
            </div>
            <form action="{{route("admin.posts.destroy", 'id')}}" method="POST">
                @csrf
                @method("DELETE")
                <input type="hidden" id="delete-id" name="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, do it</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
