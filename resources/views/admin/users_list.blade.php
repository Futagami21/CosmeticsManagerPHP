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
    

    
    <body>
        <div>
             @include('header2')
        </div>
            @if(session('delete_success'))
                <div class="alert alert-success">
                    {{ session('delete_success') }}
                </div>
            @endif

        <h1 class="title">ユーザ一覧</h1>
        <div class="contents-area">
            <table class="table-body">
                <tr>
                    <th>ユーザ名</th>
                    <th>メールアドレス</th>
                    <th>登録日時</th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->mail }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form action="/admin_user_delete/{{ $user->id }}" method="post">
                            @csrf
                            <button class="btn submit-btn" type="submit" onclick="return admin_delete_confirm('削除しますか？') ">削除する</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="btn-area">
                <button class="btn btn-lg submit-btn" type="button" onclick="location.href='/admin_top'">トップへ</button>
                <div class="pagination">{{ $users->links('pagination::bootstrap-4') }}</div>
                
            </div>
        </div>
       
       
        
    </body>
</html>
