@extends('layouts.admin')
@section('content')
 <div class="col-md-6 mx-auto" >
    <div class="card">
        <h5 class="card-header">Create Post</h5>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" class="form-control">
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
