@extends('header')
@section('content')



    <?php
        $notlike = "https://image.flaticon.com/icons/svg/149/149222.svg";
        $like = "https://image.flaticon.com/icons/svg/148/148841.svg";
    ?>



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
                                            <button class="btn btn-outline-warning" type="submit" onclick='return confirm("投稿を削除します。よろしいですか？");'>投稿を削除</button>
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
                                @if(isset($user))
                                   <p hidden>{{$isLike = $user->likes()->where('post_id', $p->id)->first()}} </p>
                                    @if(isset($isLike))
                                        <img src={{$like}} id="like{{$p->id}}" alt="like" style="width:5%; height:5%; cursor:pointer; margin-top: auto; margin-bottom: auto" onclick="likeClicked({{$p->id}}, {{$user->id}}, 1);" >
                                    @else
                                        <img src="{{$notlike}}" id="like{{$p->id}}" alt="like" style="width:5%; height:5%; cursor:pointer; margin-top: auto; margin-bottom: auto" onclick="likeClicked({{$p->id}}, {{$user->id}}, 0);" >
                                    @endif
                                @else
                                    <img src="{{$notlike}}" alt="like" style="width:5%; height:5%; margin-top: auto; margin-bottom: auto" >
                                @endif

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
            {!! $post->links('paginator'); !!}
        </div>

        <div class="row justify-content-center">
            Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
        </div>



@endsection