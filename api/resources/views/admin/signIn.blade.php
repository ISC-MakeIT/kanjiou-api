@extends('admin.layout.common')

@section('pageTitle', 'アカウント登録')

@section('style')
    <style>
        .sign-in {
            height: calc(100vh - 72px);
        }
    </style>
@endsection

@section('main')
    <main class="w-100 sign-in d-flex align-items-center justify-content-center">
        <div class="w-50">
            <h1>アカウント登録</h1>

            <form class="mt-4" method="POST" action="{{ url('/earthAdmin/signIn') }}" >

                @if(count($errors) !== 0)
                    <p class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <span>・{{ $error }}</span><br/>
                        @endforeach
                    </p>
                @endif

                <div class="form-floating mb-3">
                    <input id="userName" class="form-control" name="userName" placeholder="user_name" type="text" value="{{ old('userName') }}" required>
                    <label for="userName">ユーザー名</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="password" class="form-control" name="password" type="password" placeholder="password" value="{{ old('password') }}" required>
                    <label for="password">パスワード</label>
                    <p class="text-body mt-2">
                        ※8文字以上<br />
                        ※大文字・小文字・数字を含める必要があります
                    </p>
                </div>

                <button type="submit" class="btn btn-primary">アカウントを登録する</button>
            </form>
        </div>
    </main>
@endsection

@section('script')
    <script></script>
@endsection
