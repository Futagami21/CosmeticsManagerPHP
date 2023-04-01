<nav class="navbar header">
  <div class="container-fluid header-width header">
    <a class="navbar-brand white" href="/home">Cosmetics Manager</a>
    <div class="d-flex">
        @if (Auth::guard('web')->check())
            <form action="{{ route('logout') }}" method="post" class="logout-btn">
            @csrf
            <button class="btn btn-outline-light white text-nowrap" onclick="return logout('ログアウトしますか？') ">ログアウト</button>
            </form>
        @endif
        @if (Auth::guard('admins')->check())
            <form action="{{ route('admin_logout') }}" method="post">
            @csrf
            <button class="btn btn-outline-light white text-nowrap" onclick="return logout('ログアウトしますか？') ">ログアウト</button>
            </form>
        @endif
        <button class="btn btn-outline-light white text-nowrap contact-btn" type="button" onclick="location.href='/contact'">お問い合わせ</button>
    </div>
        
  </div>
</nav>