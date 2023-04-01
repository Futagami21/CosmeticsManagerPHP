<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <title>cosmetics_manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/header.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('/js/click.js') }}"></script>
</head>
    <body>

    @include('header2')
        <h1 class="title">おすすめ登録確認</h1>


        <div class="contents-area">
            <form action="/recomend/{{ $cosmetic->id }}" method="post">
                @csrf
                <p class="center blue">会員ユーザに公開されます</p>
                <div>
                    <img class="detail-img m-center" src="{{ Storage::url($cosmetic->image) }}" alt="">
                    <p>商品名:{{ $cosmetic->name }}</p>
                    <p>ブランド:{{ $cosmetic->company }}</p>
                </div>            

                <p>公開用コメント ※200文字まで</p>
                @error('comment')
                    <span class="red error">{{ $message }}</span>
                @enderror
                <textarea class="form-control" wrap="soft"cols="20" rows="10" name="comment" value="{{ $cosmetic->comment }}">{{ old('comment') }}</textarea>
                <div class="btn-area">
                    <button class="btn submit-btn" type="submit">登録する</button>
                    <button class="btn submit-btn" type="button" onclick="location.href='/cosmetics_list'">戻る</button> 
                </div>

            </form>
        </div>
        


    </body>
</html>
