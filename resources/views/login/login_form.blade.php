<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログインフォーム</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])

</head>
<body>
    <div class="container">

        {{-- ログイン失敗のメッセージ --}}
        <x-alert type="danger" :session="session('login_error')" />
        {{-- ログアウト成功のメッセージ --}}
        <x-alert type="primary" :session="session('logout')" />

        <form method="POST" action="{{route('login')}}">
            @csrf

            <h1 class="mb-3">ログインフォーム</h1>
            <label for="inputEmail" class="sr-onry">Name</label>
            <input type="text" id="inputEmail" class="form-control" name="name" placeholder="Name" autofocus>
            @if ($errors->has('name'))
                @foreach ($errors->get('name') as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif

            <label for="inputPassword" class="sr-onry">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control">
            @if ($errors->has('password'))
                <p class="alert alert-danger">{{$errors->first('password')}}</p>
            @endif

            <button class="btn btn-primary mt-3" type="submit">ログイン</button>
        </form>
    </div>
</body>
</html>
