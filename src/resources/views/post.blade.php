@extends('header')
@section('content')


    <!-- エラーメッセージ。なければ表示しない -->
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    <form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data" class="text-center" >
        @isset ($filename)
            <div>
                <img src="{{ asset('storage/' . $filename) }}">
            </div>
        @endisset
{{--            <input type="file" name="uploadfile" id="img" style="display:none;"/>--}}
{{--            <label for="img">Click me to upload image</label>--}}

        <label for="photo">画像ファイル:</label>
        <input type="file" class="form-control" name="file"  id="file">
        <br>
            キャプション:
            <textarea name="caption" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
        <hr>
        {{ csrf_field() }}
        <button class="btn btn-success"> 投稿 </button>
    </form>

@endsection