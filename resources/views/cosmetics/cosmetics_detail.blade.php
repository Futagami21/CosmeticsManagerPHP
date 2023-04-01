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
        <h1 class="title">化粧品詳細</h1>

        @if(session('unregist_success'))
            <div class="alert alert-success">
                {{ session('unregist_success') }}
            </div>
        @endif

        <div class="contents-area m-center">
            
            <img class="detail-img m-center" src="{{ Storage::url($cosmetic->image) }}" alt="">
            
            <div class="center">
                <p>商品名:{{ $cosmetic->name }}</p>
                <p>ブランド名:{{ $cosmetic->company }}</p>
                @if(isset($cosmetic->expiry_date))
                    <p>使用期限{{ date('Y年m月d日',strtotime($cosmetic->expiry_date)) }}まで</p>
                @else
                    <p>使用期限登録なし</p>
                @endif
                <p>期限までの期間:{{ $cosmetic->expiry }}</p>
 
                @if($cosmetic->open_date === null)
                    <p>開封日登録なし</p>
                @else
                    <p>開封日:{{ date('Y年m月d日',strtotime($cosmetic->open_date)) }}</p>
                @endif
                @if($cosmetic->get_date === null)
                    <p>入手日登録なし</p>
                @else
                    <p>入手日:{{ date('Y年m月d日',strtotime($cosmetic->get_date)) }}</p>
                @endif
                
                <p class="wrap-sort">自分用コメント:{{ $cosmetic->memo }}</p>
                <p class="wrap-sort">公開用コメント:{{ $cosmetic->comment }}</p>
                
                @if($cosmetic->role == 0)
                    <button class="btn submit-btn detail-recomend-btn" onclick="location.href='/recomend/{{ $cosmetic->id }}'">おすすめ</button>
                @endif
                @if($cosmetic->role == 1)
                    <button class="btn submit-btn detail-recomend-btn" onclick="location.href='/recomend_unregister_for_detail/{{ $cosmetic->id }}';return unregister('解除してよろしいですか？') ">おすすめ解除</button>
                @endif
            </div>
        </div>
        
        <div class="btn-area">
            <button class="btn submit-btn" type="button" onclick="location.href='/cosmetics_edit/{{ $cosmetic->id }}'">編集する</button>
            <button class="btn submit-btn" type="button" onclick="location.href='/cosmetics_delete/{{ $cosmetic->id }}'">削除する</button>
            <button class="btn submit-btn" type="button" onclick="location.href='/cosmetics_list'">化粧品一覧に戻る</button>
        </div>
    </body>
</html>
