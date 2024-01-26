@extends('layouts.admin')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>

@endif
<main id="main">
    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <div style="float: right">

                <a  class="btn btn-primary btn-sm" href="{{ route('team.create') }}">Create</a>

        </div>


    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <h2 class="display-4">Our Team</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil sint sed, fugit distinctio ad eius itaque deserunt doloribus harum excepturi laudantium sit officiis et eaque blanditiis. Dolore natus excepturi recusandae.</p>
              </div>
            </div>
          </div>
          @foreach ($team as $team )
          <div class="col-lg-4 text-center mb-5">

            <img src="{{ url('storage/team/'. $team->image)}}" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>{{ $team->member_name }}</h4>
            <span class="d-block mb-3 text-uppercase">{{ $team->member_role }}</span>
            <p>{{ $team->member_message }}</p>
            <a style="float: right" class="btn btn-primary btn-sm" href="{{ route('team.show',$team->id)}}/">View</a>

          </div>
          <div>    </div>
            @endforeach

    </section>

  </main><!-- End #main -->
@endsection
