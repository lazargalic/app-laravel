<!DOCTYPE HTML>
<html>

@include('fixed.head')

<body>

@include('fixed.nav')

@include('fixed.sidebar')

@yield('main')


<!-- footer -->
<!-- //footer -->


<!-- End -->


</body>

</html>

<script src="{{ asset('/sajtlaravel/js/bootstrap.min.js') }} " ></script>
<script src="{{ asset('/sajtlaravel/js/main.js') }} " ></script>
