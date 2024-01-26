@extends('layouts.admin')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@section('content')
 <div class="col-md-6 mx-auto" >
    <div class="card">
        <h5 class="card-header">Create Post</h5>
        <div class="card-body">
            <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">
                    </div>
                    <div class="form-group">
                          <input id="description" type="hidden" name="description" value="{{ $post->description }}">
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
