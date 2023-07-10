<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
    <title>Document</title>

    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
      var myLink = document.querySelectorAll('a[href="#"]');
      myLink.forEach(function(link){
        link.addEventListener('click', function(e) {
          e.preventDefault();
        });
      });
     </script>
</head>
<body classname="snippet-body" id="body-pd">
@include('layouts.sidebar')
    <!--Container Main start-->
    
    <div class="height-100 bg-light">
      <div class="card mt-5">
        <div class="card-body">
          @yield('content')
        </div>
      </div>
    </div>
    <!--Container Main end-->

    
    <script type="text/javascript">

      $(document).ready(function(){
        $('nav div a').click(function(){
          $('div a').removeClass("active");
          $(this).addClass("active");
        });
      });
    </script>
    
    
</body>
</html>