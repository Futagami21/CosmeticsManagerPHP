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
    <script src="{{ asset('/js/click.js') }}"></script>
</head>
    <body>
        @auth
            @include('header2')
        @endauth
        @guest
            @include('header1')
        @endguest
        
        <h1 class="title">お問い合わせ内容確認</h1>

        <div class="contents-area center">
            <p class="center">この内容で送信しますか？</p>
            <form class="center" method="post" action="{{ url('/contact_complete') }}" >
                @csrf
                <p class="center">ユーザ名:{{ $inputs['name'] }}</p>
                <input type="hidden" name="name" value="{{ $inputs['name'] }}">
                <p class="center">メールアドレス:{{ $inputs['mail'] }}</p>
                <input type="hidden" name="mail" value="{{ $inputs['mail'] }}">
                <p class="center">お問い合わせ内容</p>
                <p class="wrap-sort">{!! nl2br(e($inputs['body'])) !!}</p>
                <input type="hidden" name="body" value="{{ $inputs['body'] }}">
                <input type="hidden" name="contact_id" value="post"><br>
                <div class="btn-area">
                    <button class="btn submit-btn" type="submit" name="submit" value="send">送信する</button>
                    <button class="btn submit-btn" type="submit" name="submit" value="back">戻る</button>
                </div>  
            </form>
        </div>
    </body>
</html>
