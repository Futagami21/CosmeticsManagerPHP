<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <title>cosmetics_manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('/js/click.js') }}"></script>
</head>
        @include('header1')
        <br>
        <form class="login-form" method="post" action="{{route('admin_login')}}">
        @csrf    
        <h1 class="title">管理者ログイン</h1>

        <div class="alert-area">
            @if(session('login'))
                <div class="alert alert-danger">
                    {{ session('login') }}
                </div>
            @endif
            @if(session('logout'))
                <div class="alert alert-danger">
                    {{ session('logout') }}
                </div>
            @endif
        </div>
        
        <p>メールアドレス</p>
        @error('mail')
            <span class="red error">{{ $message }}</span>
        @enderror
        <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="メールアドレス">

        <p>パスワード</p>
        @error('password')
            <span class="red error">{{ $message }}</span>
        @enderror
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード">

        
        <input type="hidden" name="login_id" value="login">
        
        <button class="btn btn-lg login-btn" type="submit">管理者ログイン</button>
        <br>
        <a href="/">戻る</a>
        </form>



    </body>
</html>
