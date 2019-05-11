@extends('header',['some' => $nickname ])
@section('content')
        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>github</title>
</head>
<body>

@if(Session::has('github_token'))
    logged in
@else
    not logged in
@endif

</body>
</html>
@endsection

