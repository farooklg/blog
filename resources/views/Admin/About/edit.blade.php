@extends('layouts.admin')
@section('content')
 <div class="col-md-6 mx-auto" >
    <div class="card">
        <h5 class="card-header">Edit About</h5>
        <div class="card-body">
            <form action="{{ route('about.update',$about->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="company_history">Company history</label>
                    <input type="text" name="company_history" id="company_history" class="form-control" value="{{ old('company_history', $about->company_history) }}">
                </div>
                    <div class="form-group">
                        <label for="mission_vision">mission & vision</label>
                        <textarea name="mission_vision" id="mission_vision" class="form-control">{{{  old('mission', $about->mission_vision)  }}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $about->phone_number) }}">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $about->address) }}">
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $about->email) }}">
                    </div>
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
