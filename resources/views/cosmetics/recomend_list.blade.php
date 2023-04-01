<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>cosmetics_manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('/js/click.js') }}"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
</head>
    <body>
        @include('header2')
        <h1 class="title">みんなのおすすめ一覧</h1>

        <div class="serch-sort-area">
            <div class="search-area">
            <form action="{{ route('recomend_list') }}" method="get">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" value="@if (isset($search)) {{ $search }} @endif" placeholder="キーワードを入力">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
                    <button class="btn btn-outline-secondary"><a href="{{ route('recomend_list') }}">クリア</a></button>
                </div>
            </form>
            </div>
            <div class="sort-area">
            <form action="{{route('recomend_list')}}">
                <select name="sort" id="">
                    <option hidden ></option>
                    <option value="1">作成日順</option>
                    <option value="2">いいねのみ</option>
                </select>
                <button class="btn btn-outline-secondary" type="submit" name="" value="{{old('sort')}}">並び替え</button>
            </form>
            </div>
        </div>

        <div class="" id="cardlayout-wrap">
            @foreach($cosmetics as $cosmetic)  
            <section class="card-list">
                <button class="btn list-btn" onclick="location.href='/recomend_detail/{{ $cosmetic->id }}'">
                    <figure class="card-figure"><img src="{{ Storage::url($cosmetic->image) }}"></figure>
                    <h2 class="card-title">{{ $cosmetic->name }}</h2>
                    <p class="card-text-tax">{{ $cosmetic->user->name }}さんのおすすめ</p>
                    <p class="card-text-tax">種類:{{ $cosmetic->type }}</p>
                </button>
                <div class="like-area">
                    @if (!$cosmetic->isLikedBy(Auth::user()))
                        <span class="likes flex flex-end">
                            <i class="fas fa-heart like-toggle like-btn" data-cosmetic-id="{{ $cosmetic->id }}"></i>
                            <span class="like-counter"><p>{{$cosmetic->likes_count}}</p></span>
                        </span>
                    @else
                        <span class="likes flex flex-end">
                            <i class="fas fa-heart heart like-toggle liked like-btn" data-cosmetic-id="{{ $cosmetic->id }}"></i>
                            <span class="like-counter"><p>{{$cosmetic->likes_count}}</p></span>
                        </span>
                    @endif
                </div>
            </section>
            @endforeach
        </div>

        <div class="btn-area">
            <button class="btn submit-btn" type="button" onclick="location.href='/home'">ホームに戻る</button>
        </div>
        
    </body>
</html>
