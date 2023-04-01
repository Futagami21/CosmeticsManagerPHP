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
        <h1 class="title">化粧品削除</h1>
                 
        <div class="contents-area center">
            <p class="center">本当に削除しますか？</p>    
            <div class="flex around">
                <img class="detail-img m-center" src="{{ Storage::url($cosmetic->image) }}" alt="">

                <div class="detail delete-detail">
                    <p>商品名:{{ $cosmetic->name }}</p>
                    @if(isset($cosmetic->expiry_date))
                        <p>使用期限{{ date('Y年m月d日',strtotime($cosmetic->expiry_date)) }}まで</p>
                    @else
                        <p>使用期限登録なし</p>
                    @endif
                </div>
            </div>
            
        </div>
       
        <form class="btn-area" action="/cosmetics_delete_confirm/{{ $cosmetic->id }}" method="post">
            @csrf
            <button class="btn submit-btn" type="submit">削除する</button>
            <button class="btn submit-btn" type="button" onclick="location.href='/cosmetics_detail/{{ $cosmetic->id }}'">化粧品詳細に戻る</button>
        </form>        
    </body>
</html>
