<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規登録</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center">新規登録</h1>

        <form action="{{route('DBaddUser')}}" method="POST">
            @csrf
            <label for="name" class="form-label">お名前</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="三島大路">
            @if ($errors->has('name'))
                <p class="alert alert-danger">{{$errors->first('name')}}</p>
            @endif

            <label for="mail" class="form-label">メールアドレス</label>
            <input type="mail" class="form-control" name="mail" id="mail" placeholder="daichi@gmail.com">
            @if ($errors->has('mail'))
                <p class="alert alert-danger">{{$errors->first('mail')}}</p>
            @endif

            <label for="password" class="form-label">パスワード</label>
            <input type="password" class="form-control" name="password" id="password">

            <label for="password_confirmation" class="form-label">パスワード(確認)</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            @if ($errors->has('password'))
                @foreach ($errors->get('password') as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif

            <button type="submit" class="btn btn-primary mt-3">登録</button>
        </form>
    </div>
</body>
</html>
