@extends('header')
@section('content')



    <?php $like = "8n8eyl5RvZWkGfWc7jaFod3JUeYgWqvlBEByR0lW.png"; ?>

    @isset($post)
        <div class="row">
            <div class="col-md-8 offset-md-2">
            @foreach ($post as $p)
                        <div class="img-thumbnail">
                            <div class="d-flex">
                                <form action="{{ url('profile') }}" method="get" class="p-2 mr-auto">
                                    <button name="user" class="btn btn-link" type="submit" value="{{$p->user->github_id}}">{{$p->user->github_id}}</button>
                                </form>

                                @isset($user)
                                    @if($user->github_id == $p->user->github_id)
                                        <form action="/post/{{$p->id}}" method="post" class="p-2 ml-auto">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-warning" type="submit">投稿を削除</button>
                                        </form>
                                    @endif
                                @endisset
                            </div>
                            <img src="{{ asset('storage/' . $p->picture_path)}}" alt="Lights" style="width:100%">

                            <div class="caption" style="margin-left: 1%; margin-top: 1%">
                                <p>{{ $p->caption }}</p>
                            </div>

                            <div class="d-flex" >
                                <form action="{{ url('liker') }}" method="get" class="p-2 ml-auto mt-auto mb-auto ">
                                    <button name="post" class="btn btn-outline-info" type="submit" value="{{$p->id}}">いいねしたユーザー</button>
                                </form>
{{--                                <div style="margin-top: auto; margin-bottom: auto">--}}
                                <img src="{{ asset('storage/' . $like)}}" id="like" alt="like" style="width:5%; height:5%; cursor:pointer; margin-top: auto; margin-bottom: auto" onclick="likeClicked();" >
{{--                                </div>--}}
                            </div>
                        </div>
                <br>
                <br>
            @endforeach
            </div>
            @endisset
        </div>

        <div class="row justify-content-center">
            {!! $post->links(); !!}
            <div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

        </div>

@endsection