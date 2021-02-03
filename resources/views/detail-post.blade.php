@extends('layout.app')

@section('content')
  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <div class="d-flex justify-content-between">
        <h1 class="mt-4">{{$blog->post_title}}</h1>
        <a href="{{route('view_form_update', $blog->id)}}" class="btn btn-secondary mt-5">Update Post</a>
      </div>
    
      <!-- Date/Time -->
      <p>Posted on  {{$blog->created_at->format('d-M-Y')}} </p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{url('public/image/'.$blog->img_url)}}" alt="" >

      <hr>

      <!-- Post Content -->
      <p class="lead">{{$blog->post_desc}}</p>
      <hr>

    </div>

    
    @include('components.sidebar-widget')

  </div>
@endsection


  <!-- /.row -->