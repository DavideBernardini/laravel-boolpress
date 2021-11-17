@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add a new category</div>
                <div class="card-body">
                    <form action="{{route("admin.categories.store")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Add a name" value="{{old("name")}}">
                            @error('name')
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
