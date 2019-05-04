@extends('header')
@section('content')



    @isset($post)
        <div class="row">
        @foreach ($post as $p)

                <div class="col-md-8 offset-md-2">
                    <div class="img-thumbnail">
                        <form action="{{ url('profile') }}" method="get">
                            <button name="user" type="submit" value="{{$p->user->github_id}}">{{$p->user->github_id}}</button>
                        </form>

                        <img src="{{ asset('storage/' . $p->picture_path)}}" alt="Lights" style="width:100%">
                        <div class="caption">
                            <p>{{ $p->caption }}</p>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
    @endisset
@endsection