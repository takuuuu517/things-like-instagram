@extends('header')
@section('content')
    @isset($users)
        @foreach($users as $u)
            <div class="row text-center">
                <div class="col-md-8 offset-md-2">
                    <div class="d-flex justify-content-around">

                        <form action="{{ url('profile') }}" method="get">
                            <input type="hidden" value="{{$u->github_id}}" name="user">
                            <input type="image" src="{{ $u->avatar_path}}" alt="Submit" width="100" height="100" type="submit" >
                        </form>
{{--                        <img src="{{ $u->avatar_path}}" alt="like" style="width:10%; height:10%; cursor:pointer" onclick="DoSomething();">--}}
                        <form action="{{ url('profile') }}" method="get" class="p-2 mr-auto" style="margin: auto">
                            <button name="user" class="btn" type="submit" value="{{$u->github_id}}"><h3>{{$u->github_id}}</h3></button>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        @endforeach
    @endisset
@endsection