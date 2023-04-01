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
        <h1 class="title">新しいパスワードの入力</h1>

        <div class="contents-area">

        <form action="{{ url('/password_update') }}" method="post">
            @csrf
            <p>新しいパスワード入力</p>
            <input class="form-control" type="password" name="password" class="input {{ $errors->has('password') ? 'incorrect' : '' }}">
            @error('password')
                <div class="red error">{{ $message }}</div>
            @enderror
            
            <p>新しいパスワード再入力</p>
            <input class="form-control" type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'incorrect' : '' }}">
            @error('token')
                <div class="red error">{{ $message }}</div>
            @enderror
            <br>
            <input class="" type="hidden" name="update_id" value="send">
            <input class="" type="hidden" name="reset_token" value="{{ $userToken->token }}">
            <div class="btn-area">
                  <button class="btn submit-btn" type="submit">パスワードを変更する</button>

            </div>
          
        </form>
        </div>


    </body>
</html>
