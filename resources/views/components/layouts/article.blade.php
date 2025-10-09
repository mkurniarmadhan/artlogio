<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Larablog" name="keywords">
    <meta content="Larablog" name="description">

    <!-- Favicon -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                @auth

                    <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a class="btn btn-primary" href="{{ route('login') }}">Masuk</a>

                @endauth
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="{{ route('article.index') }}" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase">{{ config('app.name') }}</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                {{-- <img class="img-fluid" src="{{ asset('assets/frontend') }}/img/ads-700x70.jpg" alt=""> --}}
            </div>
        </div>
    </div>


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase">{{ config('app.name') }}</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ route('article.index') }}" class="nav-item nav-link active">Beranda</a>

                </div>

                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                   <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Cari berdasarkan title" name="q" id="searchInput"
                                                value="{{ request('q') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



    @if (isset($header))
        {{ $header }}
    @endif

    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    {{ $slot }}
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">

                    <!-- Newsletter Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Ikuti Kamu</h3>
                        </div>
                        <div class="bg-light text-center p-4 mb-3">
                            <p>Dapatkan informasi terupdate dari kami</p>
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Masukan email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Gabung</button>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="mb-2 mt-n2 display-5 text-uppercase">
                        <span class="text-primary">{{ config('app.name') }}</span>BLOG
                    </h1>
                </a>
                <p>{{ config('app.name') }}</p>
                <div class="d-flex justify-content-start mt-4">

                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-facebook-f"></i></a>

                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Akses cepat</h4>
                <div class="d-flex flex-column justify-content-start">

                    <a class="text-secondary mb-2" href="#"><i
                            class="fa fa-angle-right text-dark mr-2"></i>Privacy & policy</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Terms
                        & conditions</a>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold" href="#">{{ config('app.name') }}</a>. {{ date('Y') }}
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>

</html>
