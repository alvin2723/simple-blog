@extends('layout.app')

@section('content')

    <div class="row">
        
        @include('components.card-post', ['blog' => $blog])

        @include('components.sidebar-widget', ['category' => $category])
     
    </div>

@endsection