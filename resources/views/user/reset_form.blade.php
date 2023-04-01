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
        <h1 class="title">パスワードリセット</h1>
        <div class="contents-area">
            <form action="{{ url('/reset_mail_send') }}" method="post">
            @csrf

            @if(session('flash_message'))
                <div class="alert alert-danger">
                    {{ session('flash_message') }}
                </div>
            @endif

            <div class="width m-center">
            <p>会員登録済みのメールアドレス</p>
            <input class="form-control" type="text" name="mail" value="{{ old('mail') }}">
            @error('mail')
                <span class="red error">{{ $message }}</span>
            @enderror
            
            </div>

            <br>
            <input class="form-control" type="hidden" name="update_id" value="send">
            <div class="btn-area">
                <button class="btn submit-btn" type="submit">再設定用メール送信</button>
            </div>
            
            <div class="center">
                <a href="/">戻る</a>
            </div>
            

        </form>
        </div>

 

    </body>
</html>
