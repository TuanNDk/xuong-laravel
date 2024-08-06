<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('theme/client/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/client/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/client/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/client/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/client/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/client/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/client/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/client/css/style.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('theme/client/font-awesome-4.7.0/css/font-awesome.min.css') }}"
        type="text/css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Section Begin -->
                @include('client.layouts.header')
                <!-- Header Section End -->

                <!-- Product Section Begin -->
                @yield('content')
                <!-- Product Section End -->

                <!-- Footer Section Begin -->
                @include('client.layouts.footer')
                <!-- Footer Section End -->

                <!-- Search Begin -->
                <div class="search-model">
                    <div class="h-100 d-flex align-items-center justify-content-center">
                        <div class="search-close-switch">+</div>
                        <form class="search-model-form">
                            <input type="text" id="search-input" placeholder="Search here.....">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Search End -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Js Plugins -->
    <script src="{{ asset('theme/client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('theme/client/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/main.js') }}"></script>

</body>

</html>
