<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <title>cosmetics_manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('/js/click.js') }}"></script>
</head>
    <body>

    @include('header2')
        <h1 class="title">化粧品登録</h1>

        <div class="">
            @if(session('register_success'))
                <div class="alert alert-success">
                    {{ session('register_success') }}
                </div>
            @endif
        </div>

        <div class="contents-area register">
            <form action="{{ url('/register') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <p>画像を選択してアップロード</p>
            <input class="btn" type="file" name="image">
            
            <p>商品名<span class="red">*</span></p>
            @error('name')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
            
            <p>種類</p>
            @error('type')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="text" name="type" value="{{ old('type') }}">

            <p>メーカー名</p>
            @error('company')
                <span class="red error">{{ $message }}</span>
            @enderror
            <input class="form-control" type="text" name="company" value="{{ old('company') }}">

            <div class="flex between">
                <p>入手日</p>
                @error('get_date')
                    <span class="red error">{{ $message }}</span>
                @enderror
                <input class="form-control date-area" type="date" name="get_date" value="{{ old('get_date') }}">        

                <p>開封日</p>
                @error('open_date')
                    <span class="red error">{{ $message }}</span>
                @enderror
                <input class="form-control date-area" type="date" name="open_date" value="{{ old('open_date') }}">
            </div>
            

            <p>使用期限</p><button type="button" class="pop btn btn-outline-secondary">使用期限の目安</button>
            @error('expiry')
                <span class="red error">{{ $message }}</span>
            @enderror
   
            <select name="expiry">
                <option hidden>{{ old('expiry') }}</option>
                <option value="">選択してください</option>
                <option value="1ヶ月">1ヶ月</option>
                <option value="3ヶ月">3ヶ月</option>
                <option value="6ヶ月">6ヶ月</option>
                <option value="1年">1年</option>
                <option value="3年">3年</option>
                <option value="">----</option>
                <option value="1ヶ月">1ヶ月</option>
                <option value="2ヶ月">2ヶ月</option>
                <option value="3ヶ月">3ヶ月</option>
                <option value="4ヶ月">4ヶ月</option>
                <option value="5ヶ月">5ヶ月</option>
                <option value="6ヶ月">6ヶ月</option>
                <option value="7ヶ月">7ヶ月</option>
                <option value="8ヶ月">8ヶ月</option>
                <option value="9ヶ月">9ヶ月</option>
                <option value="10ヶ月">10ヶ月</option>
                <option value="11">11ヶ月</option>
                <option value="1年">1年</option>
                <option value="1年1ヶ月">1年1ヶ月</option>
                <option value="1年2ヶ月">1年2ヶ月</option>
                <option value="1年3ヶ月">1年3ヶ月</option>
                <option value="1年4ヶ月">1年4ヶ月</option>
                <option value="1年5ヶ月">1年5ヶ月</option>
                <option value="1年6ヶ月">1年6ヶ月</option>
                <option value="1年7ヶ月">1年7ヶ月</option>
                <option value="1年8ヶ月">1年8ヶ月</option>
                <option value="1年9ヶ月">1年9ヶ月</option>
                <option value="1年10ヶ月">1年10ヶ月</option>
                <option value="1年11ヶ月">1年11ヶ月</option>
                <option value="2年">2年</option>
                <option value="2年1ヶ月">2年1ヶ月</option>
                <option value="2年2ヶ月">2年2ヶ月</option>
                <option value="2年3ヶ月">2年3ヶ月</option>
                <option value="2年4ヶ月">2年4ヶ月</option>
                <option value="2年5ヶ月">2年5ヶ月</option>
                <option value="2年6ヶ月">2年6ヶ月</option>
                <option value="2年7ヶ月">2年7ヶ月</option>
                <option value="2年8ヶ月">2年8ヶ月</option>
                <option value="2年9ヶ月">2年9ヶ月</option>
                <option value="2年10ヶ月">2年10ヶ月</option>
                <option value="2年11ヶ月">2年11ヶ月</option>
                <option value="3年">3年</option>
            </select>
            
            <p>自分用メモ ※200文字まで</p>
            @error('memo')
                <span class="red error">{{ $message }}</span>
            @enderror
            <textarea class="form-control" wrap="soft"cols="30" rows="5" name="memo">{{ old('memo') }}</textarea>


            <p><input type="checkbox" name="recomend_check" value="recomend">おすすめとして登録しますか？</p>
            
            <p>公開用コメント ※200文字まで</p>
            <p>(おすすめとして公開する場合はこちらが公開されます)</p>
            <textarea class="form-control" wrap="soft"cols="30" rows="5" name="comment">{{ old('comment') }}</textarea>
            @error('comment')
                <span class="red error">{{ $message }}</span>
            @enderror
            <br>
            <div class="btn-area">
                <input type="hidden" name="register_id" value="post">
                <button class="btn btn-secondary submit-btn" type="submit" onclick="return register('この内容で登録しますか？') ">登録する</button>
                <button class="btn btn-secondary submit-btn" type="button" onclick="location.href='/home'">ホームに戻る</button>
            </div>

            

            </form>
        </div>

        


        <div class="sinein-pop">
            <div class="overlay">
            </div>
            <div class="popup-window">
                <p class="under pop-title">使用期限について</p>
                <div class="pop-contents">
                    <p class="center">参考リスト</p>
                    <p class="pop-list">※あくまで目安です</p>
                    <p class="pop-list">※ブランドによっても変わります。</p>
                    <p class="pop-list">未開封　3年</p>
                    <p class="pop-list">・アイシャドウ:2年</p>
                    <p class="pop-list">・アイライナー(リキッド、ペンシル):3ヶ月</p>
                    <p class="pop-list">・化粧水:3ヶ月から半年</p>
                    <p class="pop-list">・チーク:半年から1年</p>
                    <p class="pop-list">・乳液:半年</p>
                    <p class="pop-list">・日焼け止め:1年</p>
                    <p class="pop-list">・美容液:2年</p>
                    <p class="pop-list">・ファンデーション(パウダー):2年</p>
                    <p class="pop-list">・ファンデーション(リキッド):半年から1年</p>
                    <p class="pop-list">・マスカラ:3ヶ月</p>
                    <p class="pop-list">・マニキュア:2年</p>
                    <p class="pop-list">・リップクリーム:3ヶ月から1年</p>
                    <p class="pop-list">・リップグロス:3ヶ月から半年</p>
                </div>          
            </dev>
            
        </div>
    </body>
</html>
