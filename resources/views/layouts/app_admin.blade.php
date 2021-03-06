<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('backend/images/logo_2H_tech.png')}}" />

  {{-- font-awesome --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  
</head>
<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
@include('admin_sidebar.navbar1')
    <!-- partial -->


    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->


      @include('admin_sidebar.navbar2')


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            


@yield('content')


</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->


@include('include.admin_footer')


<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('backend/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('backend/js/off-canvas.js')}}"></script>
<script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/settings.js')}}"></script>
<script src="{{asset('backend/js/todolist.js')}}"></script>
<script src="{{asset('backend/js/bootbox.min.js')}}"></script>
<script src="{{asset('bootbox.locales.min.js')}}"></script>

<!-- endinject -->
<!-- Custom js for this page-->
@yield('script')
<!-- End custom js for this page-->
{{-- <script>
  $(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("url");
    bootbox.confirm("Ban co chac la muon xoa khong ?", function(confirmed){
      if(confirmed){
        window.location.url = link;
      };
    });
  });

</script> --}}
</body>

</html>

