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
        <h1>ユーザ編集</h1>

        @if(session('edit_success'))
            <div class="alert alert-success">
                {{ session('edit_success') }}
            </div>
        @endif

        <div class="contents-area">
            <form action="/user_edit_confirm/{{ Auth::user()->id }}" method="post">
                @csrf
                <p>ユーザ名</p>
                <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
                @error('name')
                    <span class="red error">{{ $message }}</span>
                @enderror
                
                <p>メールアドレス</p>
                <input class="form-control" type="text" name="mail" value="{{ Auth::user()->mail }}">
                @error('mail')
                    <span class="red error">{{ $message }}</span>
                @enderror
                
                <br>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="password" value="{{ Auth::user()->password }}">
                <input type="hidden" name="edit_id" value="edit">
                <div class="btn-area">
                    <button class="btn submit-btn" type="submit" onclick="return register('この内容で編集しますか？') ">編集する</button>
                    <button class="btn submit-btn" type="button" onclick="location.href='/mypage'">マイページへ戻る</button>
                </div>



            </form>
        </div>

        

    </body>
</html>
