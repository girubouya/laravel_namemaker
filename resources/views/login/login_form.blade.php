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
        <form method="POST" action="{{route('login')}}">
            @csrf

            <h1 class="mb-3">ログインフォーム</h1>
            <label for="inputEmail" class="sr-onry">Email</label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" autofocus>
            @if ($errors->has('email'))
                @foreach ($errors->get('email') as $error)
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
