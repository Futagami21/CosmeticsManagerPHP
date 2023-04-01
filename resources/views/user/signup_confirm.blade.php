<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <title>cosmetics_manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
    <body>
    @include('header1')
    <h1 class="title">登録内容確認</h1>
    <p class="center">この内容で登録しますか？</p>
    <form class="center" method="post" action="{{ url('/signup_complete') }}" >
        @csrf
        <p class="center">ユーザ名</p>
        {{ $inputs['name'] }}
        <input type="hidden" name="name" value="{{ $inputs['name'] }}">
        <p class="center">メールアドレス</p>
        {{ $inputs['mail'] }}
        <input type="hidden" name="mail" value="{{ $inputs['mail'] }}">
        <p class="center">パスワード</p>
        {{ str_repeat("*",mb_strlen($inputs['password'],"UTF8")) }}
        <input type="hidden" name="password" value="{{ $inputs['password'] }}">
        <input type="hidden" name="login_id" value="login"><br>
        <div class="btn-area">
            <button class="btn submit-btn" type="submit" name="submit" value="send">登録する</button>
            <button class="btn submit-btn" type="button" onclick="location.href='/show_signup'">戻る</button>
        </div>
        
    </form>
    </body>
</html>
