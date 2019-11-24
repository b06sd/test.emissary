<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Emissary - @yield('title')</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/fontawesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/metisMenu/dist/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/animate.css/animate.css') }}" />
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <!-- Datatable styles -->
    @yield('dt-css')

    <!-- App styles -->
    <link rel="stylesheet" href="{{ secure_asset('assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ secure_asset('assets/fonts/pe-icon-7-stroke/css/helper.css') }}" />
    <link rel="stylesheet" href="{{ secure_asset('assets/styles/style.css') }}">

</head>

<body class="fixed-navbar sidebar-scroll">

    <!-- Skin option / for demo purpose only -->
    <style>
        .skin-option {
            position: fixed;
            text-align: center;
            right: -1px;
            padding: 10px;
            top: 80px;
            width: 150px;
            height: 133px;
            text-transform: uppercase;
            background-color: #ffffff;
            box-shadow: 0 1px 10px 0px rgba(0, 0, 0, 0.05), 10px 12px 7px 3px rgba(0, 0, 0, .1);
            border-radius: 4px 0 0 4px;
            z-index: 100;
        }
    </style>
    <!-- End skin option / for demo purpose only -->

    <!-- Header -->
    <div id="header">
        <div class="color-line">
        </div>
        <div id="logo" class="light-version">
            <span>
                <img class="centered" src="{{ secure_asset('assets/images/lirs_logo.png') }}"
                    style="width:32px; height:26px;">
                Emissary
            </span>
        </div>
        @include('partials.nav')
    </div>

    <!-- Navigation -->
    @include('partials.side')

    <!-- Main Wrapper -->
    <div id="wrapper">

        @yield('content')

        <!-- Footer-->
        <footer class="footer">
            <span class="pull-right">
                Courier Management Solution.
            </span>
            IT Unit 2019
        </footer>

    </div>



    <!-- Vendor scripts -->
    <script src="{{ secure_asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/iCheck/icheck.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/sparkline/index.js') }}"></script>
    <!-- Datatable Js -->
    @yield('dt-js')
    <!-- App scripts -->
    <script src="{{ secure_asset('assets/scripts/homer.js') }}"></script>

    <script>
        $(function () {

        /**
         * Flot charts data and options
         */
        var data1 = [ [0, 55], [1, 48], [2, 40], [3, 36], [4, 40], [5, 60], [6, 50], [7, 51] ];
        var data2 = [ [0, 56], [1, 49], [2, 41], [3, 38], [4, 46], [5, 67], [6, 57], [7, 59] ];

        var chartUsersOptions = {
            series: {
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
            },
            grid: {
                tickColor: "#f0f0f0",
                borderWidth: 1,
                borderColor: 'f0f0f0',
                color: '#6a6c6f'
            },
            colors: [ "#62cb31", "#efefef"],
        };

        $.plot($("#flot-line-chart"), [data1, data2], chartUsersOptions);

        /**
         * Flot charts 2 data and options
         */
        var chartIncomeData = [
            {
                label: "line",
                data: [ [1, 10], [2, 26], [3, 16], [4, 36], [5, 32], [6, 51] ]
            }
        ];

        var chartIncomeOptions = {
            series: {
                lines: {
                    show: true,
                    lineWidth: 0,
                    fill: true,
                    fillColor: "#64cc34"

                }
            },
            colors: ["#62cb31"],
            grid: {
                show: false
            },
            legend: {
                show: false
            }
        };

        $.plot($("#flot-income-chart"), chartIncomeData, chartIncomeOptions);



    });

    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');

    </script>

</body>

</html>