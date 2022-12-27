<header class="w-100 p-3 bg-dark text-white sticky-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a
                        href="{{ url('/earthAdmin/ranks/default') }}"
                        class="nav-link px-2 {{ url('/earthAdmin/ranks/default') === request()->fullUrl() ? 'text-secondary' : 'text-white' }}"
                    >ランキングを閲覧</a>
                </li>
            </ul>

            @auth
                <div class="text-end">
                    <form action="{{ url('/earthAdmin/logout') }}" method="POST">
                        <button type="submit" class="btn btn-outline-light me-2">ログアウト</button>
                    </form>
                </div>
            @else
                <div class="text-end">
                    <a href="{{ url('/earthAdmin/login') }}" class="btn btn-outline-light me-2">ログイン</a>
                    <a href="{{ url('/earthAdmin/signIn') }}" class="btn btn-warning">アカウントを登録</a>
                </div>
            @endauth
        </div>
    </div>
</header>
