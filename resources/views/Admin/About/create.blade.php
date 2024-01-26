@extends('layouts.admin')
@section('content')
 <div class="col-md-6 mx-auto" >
    <div class="card">
        <h5 class="card-header">Create About</h5>
        <div class="card-body">
            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="company_history">Company history</label>
                    <input type="text" name="company_history" id="company_history" class="form-control">
                </div>
                    <div class="form-group">
                        <label for="mission_vision">mission & vision</label>
                        <textarea name="mission_vision" id="mission_vision" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
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
