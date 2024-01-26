@extends('layouts.admin')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>

@endif
<div style="float: right">
    <a  class="btn btn-primary btn-sm" href="{{ route('admin.posts.create')}}/">Create</a>
</div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                </tr>
              </thead>
              <tbody>

@foreach ($post as $post )
<tr>
    <th scope="row">{{ $post->id }}</th>
    <td>{{ $post->title }}</td>
    <td>{{ $post->category->name }}</td>

    <td>  <a style="float: right" class="btn btn-primary btn-sm" href="{{ route('admin.posts.show',$post->id)}}/">View</a> </td>

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
