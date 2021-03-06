<!DOCTYPE HTML>
<html>
<head>
    <title>Dance-Club | Admin | @yield("title")</title>
    <link rel="icon" href="{{asset("/images/icon.ico")}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset("/css/adminCss/bootstrap.css") }}" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="{{ asset("/css/adminCss/style.css") }}" rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- side nav css file -->
    <link href="{{ asset("/css/adminCss/SidebarNav.min.css") }}" media='all' rel='stylesheet' type='text/css'/>
    <!-- //side nav css file -->

    <!-- js-->
    <script src="{{ asset("/js/adminJs/jquery-1.11.1.min.js") }}"></script>
    <script src="{{ asset("/js/adminJs/modernizr.custom.js") }}"></script>
    @section("js")
        @show
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->

    <!-- chart -->
    <script src="{{ asset("/js/adminJs/Chart.js") }}"></script>
    <!-- //chart -->

    <!-- Metis Menu -->
    <script src=" {{ asset("/js/adminJs/metisMenu.min.js") }}"></script>
    <script src=" {{ asset("/js/adminJs/custom.js") }} "></script>
    <link href="{{ asset("/css/adminCss/custom.css") }}" rel="stylesheet">
    <!--//Metis Menu -->
    <style>
        #chartdiv {
            width: 100%;
            height: 295px;
        }
    </style>
    <!--pie-chart --><!-- index page sales reviews visitors pie chart -->
    <script src=" {{ asset("/js/adminJs/pie-chart.js") }}" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
    <!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

    <!-- requried-jsfiles-for owl -->
    <link href="{{ asset("/css/adminCss/owl.carousel.css") }}" rel="stylesheet">
    <script src="{{ asset("/js/adminJs/owl.carousel.js") }}"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                items : 3,
                lazyLoad : true,
                autoPlay : true,
                pagination : true,
                nav:true,
            });
        });
    </script>
    <!-- //requried-jsfiles-for owl -->
</head>
