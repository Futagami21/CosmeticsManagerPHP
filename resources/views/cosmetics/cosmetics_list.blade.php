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

</head>
    <body>



    @include('header2')
        <h1 class="title">化粧品一覧</h1>
        @if(isset($alert))
        {{ $alert }}
        @endif

        <div class="serch-sort-area">
            <div class="search-area">
            <form action="{{ route('show_cosmetics_list') }}" method="get">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" value="@if (isset($search)) {{ $search }} @endif" placeholder="キーワードを入力">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
                    <button class="btn btn-outline-secondary"><a href="{{ route('show_cosmetics_list') }}">クリア</a></button>
                </div>
            </form>
            </div>
            <div class="sort-area">
            <form action="{{route('show_cosmetics_list')}}">
                <select name="sort" id="">
                <option hidden>{{ $sort }}</option>
                    <option value="1">作成日順</option>
                    <option value="2">期限が近い順</option>
                    <option value="3">お気に入りのみ</option>
                    <option value="4">期限が近いもの</option>
                </select>
                <button class="btn btn-outline-secondary" type="submit" name="" value="{{old('sort')}}">並び替え</button>
            </form>
            </div>
        </div>
        

        
        
        @if(session('unregist_success'))
            <div class="alert alert-success">
                {{ session('unregist_success') }}
            </div>
        @endif


        <div class="" id="cardlayout-wrap">
            @foreach($cosmetics as $cosmetic)  
            <section class="card-list">
                <button class="btn list-btn" onclick="location.href='/cosmetics_detail/{{ $cosmetic->id }}'">
                    <figure class="card-figure"><img src="{{ Storage::url($cosmetic->image) }}"></figure>
                    <h2 class="card-title">{{ $cosmetic->name }}</h2>
                    <p class="card-text-tax">種類:{{ $cosmetic->type }}</p>
                    @if(isset($cosmetic->expiry_date))
                        <p class="card-text-tax">{{ date('Y年m月d日',strtotime($cosmetic->expiry_date)) }}まで</p>
                    @else
                        <p class="card-text-tax">登録なし</p>
                    @endif
                </button>
                <div class="list-btn-area flex">
                    @if($cosmetic->role == 0)
                    <a href="/recomend/{{ $cosmetic->id }}" class="btn btn-secondary recomend-btn">おすすめ</a>
                    @else
                    <a href="/recomend_unregister_for_list/{{ $cosmetic->id }}" onclick="return unregister_confirm('ログアウトしますか？') " class="btn btn-secondary recomend-btn">おすすめ解除</a>
                    @endif
                    @if($cosmetic->favorite == 0)
                        <a href="/favorite/{{ $cosmetic->id }}" class="btn btn-secondary recomend-btn"><i class="far fa-star"></i></a>
                    @else
                    <a href="/favorite/{{ $cosmetic->id }}" class="btn btn-secondary recomend-btn"><i class="fas fa-star" style="color: #ffcf24;"></i></a>
                    @endif
                </div>
            </section>
            @endforeach
        </div>

        <div class="paginate-area">
            <p>{{ $cosmetics->links('pagination::bootstrap-4') }}</p>
            
        </div>
        
        <br>
        <div class="btn-area">
            <button class="btn btn-secondary submit-btn" type="button" onclick="location.href='/cosmetics_register'">アイテムの追加</button>
            <button class="btn btn-secondary submit-btn" type="button" onclick="location.href='/recomend_list'">みんなのおすすめを見る</button>
            <button class="btn btn-secondary submit-btn" type="button" onclick="location.href='/home'">ホームに戻る</button>
        </div>

        

    </body>
</html>
