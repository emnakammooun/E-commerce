<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    {{-- Admin Template Styles --}}
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/style.css">
    <link rel="shortcut icon" href="{{ asset('admin_assets') }}/images/favicon.ico" />
    {{-- End Admin Template Styles --}}

        <!-- Favicon -->
        <link href="{{asset('site_assets')}}/img/favicon.ico" rel="icon">

            <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

            <!-- Libraries Stylesheet -->
    <link href="{{asset('site_assets')}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{asset('site_assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('site_assets')}}/css/style.css" rel="stylesheet">
    @inertiaHead
  </head>
  <body>
    @inertia


    {{-- Admin Template Scripts --}}
    <script src="{{ asset('admin_assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('admin_assets') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('admin_assets') }}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{ asset('admin_assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('admin_assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('admin_assets') }}/js/misc.js"></script>
    <script src="{{ asset('admin_assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('admin_assets') }}/js/todolist.js"></script>
    {{-- End Admin Template Scripts --}}

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('site_assets')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('site_assets')}}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('site_assets')}}/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{asset('site_assets')}}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('site_assets')}}/js/main.js"></script>
  </body>
</html>
