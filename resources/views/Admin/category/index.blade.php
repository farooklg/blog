@extends('layouts.admin')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>

@endif
<div style="float: right">
    <a  class="btn btn-primary btn-sm" href="{{ route('categories.create')}}/">Create</a>
</div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NAME</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

@foreach ($category as $category )
<tr>
    <th scope="row">{{ $category->id }}</th>
    <td>{{ $category->name }}</td>
<td>
    <a style="float: right" class="btn btn-primary btn-sm" href="{{ route('categories.edit',$category->id)}}/">Edit</a>

    <form action="{{ route('categories.destroy',$category->id)}}" method="POST">
    @csrf
        @method('DELETE')
    <button class="btn btn-danger btn-sm" style="float:right" type="submit">Delete</button>

  </form>
</td>
  </tr>
@endforeach
              </tbody>
            </table>


          </div>
        </div>



</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="credits">
    Designed by <a href="">Lawal Farouk Garba</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


@endsection
