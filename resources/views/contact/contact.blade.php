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
    
        <h1 class="title">お問い合わせ</h1>

        <form class="login-form" action="{{ url('/contact_confirm') }}" method="post">
            @csrf
            <p>名前</p>
            @error('name')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
            
            <p>返信用メールアドレス</p>
            @error('mail')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="text" name="mail" value="{{ old('mail') }}">
            
            <p>お問い合わせ</p>
            @error('body')
                <span class="red error">{{ $message }}</span>
            @enderror
            <textarea wrap="sort" class="form-control wrap-sort" wrap="soft"cols="30" rows="10" name="body">{{ old('body') }}</textarea>
            <br>
            <input type="hidden" name="contact_id" value="post">
            <div class="btn-area">
                <button class="btn submit-btn" type="submit">確認画面へ</button>
                <button  class="btn submit-btn" type="button" onclick="location.href='/'">ホームへ</button>
            </div>
        </form>
    </body>
</html>
