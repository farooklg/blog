@extends('Admin.index')
@section('content')
  <!-- ======= posts Section ======= -->
  <section id="posts" class="posts section-bg">
    <div class="container">

        <form action="{{ route('admin.posts.destroy',$post->id)}}" method="POST">
            @csrf
                @method('DELETE')
            <button class="btn btn-danger btn-sm" style="float:right" type="submit">Delete</button>

          </form>
          <div style="float: right">
            <a  class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit',$post->id)}}/">Edit</a>
        </div>
      <div class="section-title">
        <h2>posts</h2>
       </div>

      <div class="row posts-content">

        <div class="col-lg-6" data-aos="fade-up">

          <div> <h4>Title</h4>
           <p>{{ $post->title }}</p>
 <div>

    <div class="col-lg-6" data-aos="fade-up">

        <div>
            <h4>Description</h4>
         <p>   {!! preg_replace('/<figure data-trix-attachment="[^"]+"><img src="([^"]+)"[^>]+><\/figure>/', '<img src="$1">', $post->description) !!}
         </p>
<div>

        </div>


  </section><!-- End posts Section -->
@endsection
