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
        <h1 class="title">新規会員登録</h1>

        <form class="login-form" action="{{ url('/signup_confirm') }}" method="post">
            @csrf
            <p>ユーザ名</p>
            @error('name')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">

            <p>メールアドレス</p>
            @error('mail')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="email" name="mail" value="{{ old('mail') }}">
            
            <p>パスワード ※8文字以上32文字以内</p>
            
            @error('password')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="password" name="password" value="{{ old('password') }}">
            
            <p>パスワード確認用</p>
            
            @error('password_confirmation')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
            
            <br>
            <div class="btn-area">
                <input type="hidden" name="login_id" value="login">
                <button class="btn submit-btn" type="submit">確認画面へ</button>
                <a class="btn submit-btn" href="/">戻る</a><br>
            </div>

        </form>

    </body>
</html>
