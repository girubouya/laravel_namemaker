<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="mt-5">
            {{-- ログイン成功のメッセージ --}}
            <x-alert type="success" :session="session('login_success')" />

            <h3>プロフィール</h3>
            <ul>
                <li>名前: {{Auth::user()->name}}</li>
                <li>メールアドレス:{{Auth::user()->email}}</li>
            </ul>

            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">ログアウト</button>
            </form>
        </div>
    </div>
</body>
</html>
