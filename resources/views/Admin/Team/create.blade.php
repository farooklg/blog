@extends('layouts.admin')
@section('content')
 <div class="col-md-6 mx-auto" >
    <div class="card">
        <h5 class="card-header">Create team</h5>
        <div class="card-body">
            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="member_name">Name</label>
                        <input type="text" name="member_name" id="member_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="member_role">Role</label>
                        <input type="text" name="member_role" id="member_role" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="member_message">Message</label>
                        <textarea name="member_message" id="member_message" class="form-control"></textarea>
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
