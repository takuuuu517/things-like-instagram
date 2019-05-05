@extends('header')
@section('content')


    <div class="row ">
        <div class="col-md-2 offset-md-2 justify-content-center">
            <div class="img-thumbnail">
                <img src=" {{$avatar}}" alt="Lights" style="width:100%">
            </div>
        </div>
        <div class="col-md-2 offset-md-1 justify-content-center">
            {{$user->github_id}}
        </div>
        <div class="col-md-2 offset-md-1 justify-content-center">
            {{$like}}
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
                        <img src="{{ asset('storage/' . $p->picture_path)}}" alt="Lights" style="width:100%">
                    </div>
                </div>
            @endforeach
        </div>
    @endisset



@endsection