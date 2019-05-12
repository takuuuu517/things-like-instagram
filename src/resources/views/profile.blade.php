@extends('header')
@section('content')
    <div class="row ">
        <div class="col-md-2 offset-md-3 justify-content-center">
            <div class="img-thumbnail">
                <img src=" {{$avatar}}" alt="Lights" style="width:100%">
            </div>
        </div>
        <div class="col-md-2 offset-md-0 justify-content-center"style="margin-top: auto; margin-bottom: auto">
            <p>ユーザー名</p>
            <h3>{{$user->github_id}}</h3>
        </div>
        <div class="col-md-2 offset-md-0 justify-content-center"style="margin-top: auto; margin-bottom: auto" >
            <p>いいね合計数</p>
            <h3>{{$like}}</h3>
        </div>
    </div>

    <br>
    <hr>
    <br>

    @isset($post)
        <div class="row">
            @foreach ($post as $p)
                <div class="col-md-4">
                    <div class="img-thumbnail">
                        <img src="data:image/png;base64,{{$p->image}}" alt="posts" style="width:100%">
{{--                        <img src="{{ asset('storage/' . $p->picture_path)}}" alt="Lights" style="width:100%">--}}
                    </div>
                </div>
            @endforeach
        </div>
    @endisset



@endsection