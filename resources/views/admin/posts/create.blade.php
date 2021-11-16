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
						  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Add a title">
						  @error('title')
							<div class="alert alert-danger">{{ $message }}</div>
						  @enderror
						</div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" placeholder="Write youre name">
                            @error('author')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
						<div class="form-group">
							<label for="content">Content</label>
							<textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="10" placeholder="Add the content of the new post"></textarea>
							@error('content')
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
