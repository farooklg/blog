@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

 <div class="col-md-6 mx-auto" >
    <div class="card">
        <h5 class="card-header">Create Post</h5>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input id="description" type="hidden" name="description" value="">
                        <trix-editor input="description"></trix-editor>
                    </div>



                    <div class="form-group">
                        <label for="categories">Category</label>
                        <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                            <option value="">Select a category</option>
                            @foreach($category as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                               {{ $category->name }}
                                </option>
                            @endforeach
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>

                            @endforeach
                        </ul>
                    </div>

                    @endif

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

        </div>
      </div>
 </div>

@endsection
