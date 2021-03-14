<nav class="navbar navbar-expand navbar-dark green">

    @guest
    <a class="navbar-brand" href="/"><i class="fas fa-hippo mr-1"></i>F-community</a>
    @endguest

    @auth
    <a class="navbar-brand" href="/index"><i class="fas fa-hippo mr-1"></i>F-community</a>
    @endauth

    <ul class="navbar-nav ml-auto">

        @guest
        <li class="nav-item mt-2">
            <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>ユーザー登録</a>
        </li>
        @endguest

        @guest
        <li class="nav-item mt-2">
            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt" aria-hidden="true"></i>ログイン</a>
        </li>

        <button class="btn btn-danger pb-1">
            <a href="{{ route('login.guest') }}" class="text-white"><font size="2">ゲストログイン
            </font>
            </a>
        </button>
        @endguest

        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
        </li>
        @endauth

        @auth
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"></i>ユーザー詳細
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <button class="dropdown-item" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                    マイページ
                </button>
                <div class="dropdown-divider"></div>
                <button form="logout-button" class="dropdown-item" type="submit">
                    ログアウト
                </button>
            </div>
        </li>
        <form id="logout-button" method="POST" action="{{ route('logout') }}">
        @csrf
        </form>
        <!-- Dropdown -->
        @endauth

    </ul>


</nav>
