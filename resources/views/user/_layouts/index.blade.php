<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>SITANI</title>
        <meta name="description" content="Morden Bootstrap HTML5 Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('grocee/img/favicon.ico') }}">

        @stack('cssScript')
</head>

<body>

        <!-- Start preloader -->
        <div id="preloader">
                <div id="ctn-preloader" class="ctn-preloader">
                        <div class="animation-preloader">
                                <div class="spinner"></div>
                                <div class="txt-loading">
                                        <span data-text-preloader="L" class="letters-loading">
                                                L
                                        </span>

                                        <span data-text-preloader="O" class="letters-loading">
                                                O
                                        </span>

                                        <span data-text-preloader="A" class="letters-loading">
                                                A
                                        </span>

                                        <span data-text-preloader="D" class="letters-loading">
                                                D
                                        </span>

                                        <span data-text-preloader="I" class="letters-loading">
                                                I
                                        </span>

                                        <span data-text-preloader="N" class="letters-loading">
                                                N
                                        </span>

                                        <span data-text-preloader="G" class="letters-loading">
                                                G
                                        </span>
                                </div>
                        </div>

                        <div class="loader-section section-left"></div>
                        <div class="loader-section section-right"></div>
                </div>
        </div>
        <!-- End preloader -->

        <!-- Header start-->
        @include('user._layouts.header')
        <!-- Page Header Ends-->

        <!-- Content -->
        @yield('content')
        <!-- Content Ends-->

        <!-- Footer start-->
        @include('user._layouts.footer')
        <!-- Footer Ends-->

        <!-- Js -->
        @stack('jsScript')

        @stack('jsScriptAjax')
</body>

</html>