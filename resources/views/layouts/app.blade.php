<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Role Permission</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap4-toggle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-colorpicker.min.css')}}">

{{--    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/font-awesome.min.css')}}">--}}
<!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @include('layouts.datatables_css')
    @yield('third_party_stylesheets')

    @stack('page_css')
</head>
<style>
    @if(isset(auth_user_get()->background_color) && isset(auth_user_get()->font_color))
    @if(user_theme_get() == 'dark')
    .dark {
        color: {{auth_user_get()->font_color}}; /* RGB value for a shade of orange */
        background-color: {{auth_user_get()->background_color}}; /* RGB value for a shade of blue */
    }

    @else
    .dark {
        color: black; /* RGB value for a shade of orange */
        background-color: #312525; /* RGB value for a shade of blue */
    }
    @endif
    @endif
</style>
<body class="app sidebar-mini {{ user_theme_get() }}">
<!-- Navbar-->
@include('layouts.header')
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('layouts.sidebar')
@yield('content')
<!-- Essential javascripts for application to work-->
<script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/model_bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('admin/js/plugins/pace.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap4-toggle.min.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="{{asset('admin/js/plugins/chart.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/xlsx.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/html2canvas.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/bootstrap-colorpicker.min.js')}}"></script>

@php

    $labels = user_bar_chart()->keys();
        $data = user_bar_chart()->values();
@endphp
<!-- Google analytics script-->
<script type="text/javascript">
    var labels = {{ Js::from($labels) }};
    var users = {{ Js::from($data) }};
    var data = {
        labels: labels,
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: users
            }
        ]
    };
    var pdata = [
        {
            value: <?php echo auth_user_get()->where('status', 'active')->count() ?>,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Active User"
        },
        {
            value: <?php echo auth_user_get()->where('status', 'Block')->count() ?>,
            color: "#F7464A",
            highlight: "#FF5A5E",
            label: "Block User"
        }
    ]

    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);
</script>
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
@include('layouts.datatables_js')
{{--<script type="text/javascript" src="{{asset('admin/js/plugins/jquery.dataTables.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>--}}
@yield('third_party_scripts')
@include('scripts.theme')
@stack('page_scripts')
</body>
</html>
