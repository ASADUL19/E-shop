<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{asset('frontuser/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontuser/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontuser/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontuser/css/custom.css')}}">
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    {{-- jquery auto complete --}}
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <style>
      *
      {
        font-family: 'Roboto', sans-serif;
      }
    </style>
</head>
<body>
  @include('admin.frontnavbar')
 <div class="content">
    @yield('content')
  </div>
  <div class="whats-app-chat">
    <a href="https://wa.me/+880179175116?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank"><img src="{{asset('frontend/img/whatsapp-logo-png-hd-2.png')}}" alt="" width="100" height="100"></a>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{asset('frontuser/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontuser/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontuser/js/custom.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/625869f87b967b11798acb19/1g0klruti';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
<!--End of Tawk.to Script-->
   <script>
    var availableTags = [ ];
    $.ajax({
      method:"GET",
      url:"/product-list",
      success:function(response)
      {
        autocomplete(response);
      }
    });
    function autocomplete(availableTags)
    {
    $( "#tags" ).autocomplete({
      source: availableTags
    });
    }
  </script>
  @if(session('status'))
  <script>
    swal("{{ session('status') }}");
  </script>
  @endif
    @yield('scripts')
  </body>
</html>
