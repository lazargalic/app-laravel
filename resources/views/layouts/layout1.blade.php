<!DOCTYPE HTML>
<html>


@include('fixed.head')


<body>

@include('fixed.nav')

@include('fixed.sidebar')

@yield('main')


    <!-- footer -->
    @include('fixed.footer')
    <!-- //footer -->


<!-- End -->

@include('fixed.ending')

</body>

</html>
