<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
<div class="container">
    <ul class="nav justify-content-center">
        <li class="nav-item justify-content-left">
            <a class="nav-link active" aria-current="page" href="/category">Categories</a>
        </li>
        <li class="nav-item justify-content-left">
            <a class="nav-link active" aria-current="page" href="/post">Posts</a>
        </li>
        <li class="nav-item justify-content-left" >
            <a class="nav-link active" aria-current="page" href="/tag">Tags</a>
        </li>

        <li class="nav-item" >
            @auth
                    <a class="nav-link active" aria-current="page" href="/user"><img src="https://www.flaticon.com/premium-icon/icons/svg/666/666201.svg" height="30px"></a>
            @endauth
            @guest
                    <a class="nav-link active" aria-current="page" href="/login"><img src="https://www.flaticon.com/premium-icon/icons/svg/666/666201.svg" height="30px"></a>
            @endguest
        </li>
    </ul>
</div>

<div class="container">
@yield('content')
</div>





</body>
</html>
