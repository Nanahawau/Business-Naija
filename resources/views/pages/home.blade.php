<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    @include('partials._styles')
</head>
<body>
@include('navigation.navbar')
<div class="container d-flex flex-row justify-content-center">
    <div class="category-div">
        <span class="categories"><img class="img-fluid my-3" style="width: 100px;" src="{{asset('images/gymmm.jpg')}}"></span>
        <span class="categories"><img class="img-fluid my-3" style="width: 100px;" src="{{asset('images/gymmm.jpg')}}"></span>
        <span class="categories"><img class="img-fluid my-3" style="width: 100px;" src="{{asset('images/gymmm.jpg')}}"></span>
        <span class="categories"><img class="img-fluid my-3" style="width: 100px;" src="{{asset('images/gymmm.jpg')}}"></span>
        <span class="categories"><i class="fas fa-angle-double-right fa-2x"></i></span>
    </div>
</div>
<div class="carousel">

</div>

@include('partials._scripts')
</body>
</html>
