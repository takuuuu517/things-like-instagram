<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Things like Instagram</title>


    {{--        <base href="{{URL::asset('/')}}" target="_blank">--}}
    <link rel="stylesheet" href="{{ url('css/mystyle.css') }}">

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

    <script src="{{ url('js/jquery-3.4.0.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
<nav class="navbar navbar-light justify-content-center" style="background-color: #e3f2fd;">
    <form class="form-inline">
        @if(Session::has('github_token'))
            <a href="/home" target="_self" class="btn btn-sm btn-outline-secondary">ホーム</a>
            <a href="/logout/github" target="_self" class="btn btn-sm btn-outline-secondary">ログアウト</a>
            <a href="/post" target="_self" class="btn btn-sm btn-outline-secondary">投稿</a>
        @else
            <a href="/home" target="_self" class="btn btn-sm btn-outline-secondary">ホーム</a>
            <a href="/" target="_self" class="btn btn-sm btn-outline-secondary">ログイン</a>
            <a href="/" target="_self" class="btn btn-sm btn-outline-secondary">投稿</a>
        @endif
    </form>
</nav>

<div class="container general_margin">
    @yield('content')
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('/js/like.js')}}"></script>
</div>
</body>
</html>