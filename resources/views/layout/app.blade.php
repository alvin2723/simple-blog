<!DOCTYPE html>
<html lang="en">

<head>

  @include('layout.head')

</head>

<body>

    @include('layout.navbar')
    <!-- Page Content -->
    <main class="container">
      @if (session()->has('message'))
        <div class="alert alert-success my-4">
            {{ session('message') }}
        </div>
        @yield('content')

      @elseif(session()->has('warning'))
          <div class="alert alert-warning my-4">
              {{ session('warning') }}
          </div>
          @yield('content')
      @else
          @yield('content')
      @endif
        <!-- /.row -->
    </main>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
