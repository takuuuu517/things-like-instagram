@extends('header')
@section('content')
    @isset($users)
        @foreach($users as $u)
            <div class="row text-center">
                <div class="col-md-8 offset-md-2">
                    <div class="d-flex align-self-center">
                        <img src="{{ $u->avatar_path}}" alt="like" style="width:10%; height:10%; cursor:pointer" onclick="DoSomething();">
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