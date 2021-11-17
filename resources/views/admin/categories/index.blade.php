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
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category["id"]}}</td>
                                <td>{{$category["name"]}}</td>
                                <td>{{$category["slug"]}}</td>
                                <td>
                                    <a href="{{route("admin.categories.show", $category["id"])}}">
                                        <button type="button" class="btn btn-primary">View</button>
                                    </a>
                                    <a href="{{route("admin.categories.edit", $category["id"])}}">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn_delete" data-id="{{$category["id"]}}" data-toggle="modal" data-target="#deleteModal">
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
                <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to delete the category?
            </div>
            <form action="{{route("admin.categories.destroy", 'id')}}" method="POST">
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
