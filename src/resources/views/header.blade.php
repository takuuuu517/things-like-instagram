<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Header</title>

    {{--        <base href="{{URL::asset('/')}}" target="_blank">--}}
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/mystyle.css') }}">

    <script src="{{ url('js/jquery-3.4.0.min.js') }}"></script>

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
            <a href="/login/github" target="_self" class="btn btn-sm btn-outline-secondary">ログイン</a>
            <a href="/" target="_self" class="btn btn-sm btn-outline-secondary">投稿</a>
        @endif
    </form>
</nav>

<div class="container general_margin">

    @yield('content')
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</div>


</body>
</html>