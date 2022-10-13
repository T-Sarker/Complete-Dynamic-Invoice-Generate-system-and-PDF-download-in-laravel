<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <!-- End layout styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    
</head>

<body>
    
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('../partials/header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('../partials/sidebar')
            <!-- partial -->
            <div class="main-panel">
                
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @yield('content')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <div class="footer">
            <div class="text-center">
                <p>Copyright © <b>{{date('Y')}}</b> Invoice Admin Panel. All rights reserve</p>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    @stack('scripts')
</body>

</html>