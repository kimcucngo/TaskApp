<!DOCTYPE html>
<html lang="en">

<!-- head -->
@include('common.header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('common.sidebar')
    <!-- End of Sidebar -->

   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      @include('common.userinfo')
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">
        @yield('user')
    </div>
    <hr/>
    <!-- End of Main Content -->
      <!-- Footer -->
      @include('common.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/chart-area-demo.js')}}"></script>
  <script src="{{asset('js/chart-pie-demo.js')}}"></script>

</body>

</html>
