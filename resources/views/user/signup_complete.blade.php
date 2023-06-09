<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <title>cosmetics_manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
    <body>
        @include('header1')
        <h1 class="title">ユーザ登録</h1>
        <div class="contents-area">
            <p class="center">新規登録完了しました！</p>
            <form method="post" action="{{route('login')}}">
                @csrf
                <input type="hidden" name="name" value="{{ $inputs['name'] }}">
                <input type="hidden" name="mail" value="{{ $inputs['mail'] }}">
                <input type="hidden" name="password" value="{{ $inputs['password'] }}">
                <div class="btn-area"><button class="btn submit-btn" type="submit" name="submit">さっそく使ってみる</button></div>
            </form>
        </div>
    </body>
</html>
