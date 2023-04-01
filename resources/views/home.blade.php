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
        <div>
             @include('header2')
        </div>
        <p class="title">ようこそ、{{ Auth::user()->name }}さん</p>
        <div class="contents-area">
            
            <div class="home-list">
                <button class="btn square" onclick="location.href='/cosmetics_list'">化粧品リスト</button>
                <button class="btn square" onclick="location.href='/recomend_list'">みんなのおすすめアイテム</button>
                <button class="btn square" onclick="location.href='/cosmetics_register'">アイテムを登録する</button>
                <button class="btn square" onclick="location.href='/mypage'">マイページ</button>
            </div>
            <div class="btn-area">
                @if(isset($alert))
                <form class="e-btn" action="{{route('show_cosmetics_list')}}">
                <button class="expiry-btn" name="sort" value="4" >{{ $alert }}</button>
                </form>      
                @endif
            </div>
            
            @if(session('expiry_alert'))
                <div class="alert alert-success">
                    {{ session('expiry_alert') }}
                </div>
            @endif
        </div>    

    </body>
</html>
