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
    

    <!-- @if(session('login_success'))
        <div class="alert alert-success">
            {{ session('login_success') }}
        </div>
    @endif -->
    <body>
        <div>
             @include('header2')
        </div>

        <h1 class="title">マイページ</h1>
       
        <div class="contents-area">

            <div class="mypage-list">
                <button class="btn square" onclick="location.href='/user_edit/{{ Auth::user()->id }}'">ユーザ情報編集</button>
            <button class="btn square" onclick="location.href='/user_delete/{{ Auth::user()->id }}'">ユーザ情報を削除する</button>
            </div>
            
            <button class="btn submit-btn" type="button" onclick="location.href='/'">ホームに戻る</button>
        </div>

    </body>
</html>
