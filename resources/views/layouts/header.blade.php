<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}  " rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{URL::asset('assets/css/simple-sidebar.css')}} " rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- sidebar -->
    @include('layouts.sidebar')
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <!-- navbar -->
      @include('layouts.navbar')
      <div class="container-fluid">
          @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  
  <!-- footer -->
  @include('layouts.footer')