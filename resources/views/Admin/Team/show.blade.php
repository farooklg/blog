@extends('layouts.admin')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>

@endif

<main id="main">
    <section>
      <div class="container" data-aos="fade-up">
        <form action="{{ route('team.destroy',$team->id)}}" method="POST">
            @csrf
                @method('DELETE')
            <button class="btn btn-danger btn-sm" style="float:right" type="submit">Delete</button>

          </form>
          <div style="float: right">
            <a  class="btn btn-primary btn-sm" href="{{ route('team.edit',$team->id)}}/">Edit</a>
        </div>
        <div class="row">
          <div class="col-lg-12 text-center mb-5">



    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">


          <div class="col-lg-4 text-center mb-5">

            <img src="{{ url('storage/team/'. $team->image)}}" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>{{ $team->member_name }}</h4>
            <span class="d-block mb-3 text-uppercase">{{ $team->member_role }}</span>
            <p>{{ $team->member_message }}</p>
             </div>
          <div>    </div>


    </section>

  </main><!-- End #main -->
@endsection
