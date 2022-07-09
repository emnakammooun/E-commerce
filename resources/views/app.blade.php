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
  </body>
</html>
