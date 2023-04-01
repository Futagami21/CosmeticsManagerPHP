<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <title>cosmetics_manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('/js/click.js') }}"></script>
</head>
    <body>

        @include('header2')
        <h1 class="title">ユーザ削除</h1>
        <div class="contents-area">
            <p class="center">ユーザ情報を本当に削除してよろしいですか？</p>

            <p class="center">{{ Auth::user()->name }}さん</p>
            <p class="center">メールアドレス:{{ Auth::user()->mail }}</p>
            

            <form action="/user_delete_complete" method="post">
                @csrf
                <br>
                <div class="btn-area">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button class="btn submit-btn" type="submit" onclick="return delete_confirm('ユーザ情報が全て失われます。') ">削除する</button>
                    <button class="btn submit-btn" type="button" onclick="location.href='/mypage'">マイページへ戻る</button>
                </div>
                
            </form>
        </div>

    </body>
</html>
