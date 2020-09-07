<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hostel Advisor</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('/bootstrap-4.5.0/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('datatables/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('datatables/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('summernote/summernote-bs4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/intltel/css/intlTelInput.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/intltel/css/demo.css') }}">
    </head>
    
    <body class="container">
        <div class="jumbotron">
            <h4 class="text-uppercase lead">hostel advisor</h4>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="/universities">Universities <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/hostels">Hostels</a>
              </li>
            </ul>
          </div>
        </nav>
        <section>
            @yield('content')
        </section>

    </body>

    <!-- script -->
    <script type="text/javascript" src="{{URL::asset('bootstrap-4.5.0/jquery/jquery-3.5.1.slim.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('bootstrap-4.5.0/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('bootstrap-4.5.0/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/datatables/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('summernote/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('summernote/summernote-bs4.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#summernote').summernote();
    });
</script><script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote();
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>
</html>
