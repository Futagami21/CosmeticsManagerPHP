<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>cosmetics_manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('/js/click.js') }}"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
</head>
    <body>

        @include('header2')
        <h1 class="title">おすすめアイテム詳細</h1>

        <div class="contents-area m-center">

			<div class="m-center">
				<img class="detail-img m-center" src="{{ Storage::url($cosmetic->image) }}" alt="">
			</div>

            <div class="center">
				<p>{{ $cosmetic->user->name }}さんのおすすめアイテム</p>
                <p>商品名:{{ $cosmetic->name }}</p>
                <p>ブランド名:{{ $cosmetic->company }}</p>
                <p class="wrap-sort">コメント:{{ $cosmetic->comment }}</p>
                    
            </div>

            @if (!$cosmetic->isLikedBy(Auth::user()))
                <span class="likes flex">
                    <i class="fas fa-heart like-toggle like-btn" data-cosmetic-id="{{ $cosmetic->id }}"></i>
                    <span class="like-counter"><p>{{$cosmetic->likes_count}}</p></span>
                </span>
            @else
                <span class="likes flex">
                    <i class="fas fa-heart heart like-toggle liked like-btn" data-cosmetic-id="{{ $cosmetic->id }}"></i>
                    <span class="like-counter"><p>{{$cosmetic->likes_count}}</p></span>
                </span>
            @endif
            
            
            <br>
            <button class="btn submit-btn" type="button" onclick="location.href='/recomend_list'">おすすめ一覧に戻る</button>
        </div>

    </body>
</html>
