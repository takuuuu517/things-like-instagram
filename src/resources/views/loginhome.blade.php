<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Header</title>

    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/mystyle.css') }}">

    <script src="{{ secure_asset('js/jquery-3.4.0.min.js') }}"></script>

</head>
<body>

<div class="container ">
    <div class="row align-items-center ">
        <div class="col-sm-12 ">
            <div class="text-center ">
                <div class="gitlogin_margin">
                    <a href="/github" class="btn btn-primary" >Githubでログイン</a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ secure_asset('js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
</div>


</body>
</html>