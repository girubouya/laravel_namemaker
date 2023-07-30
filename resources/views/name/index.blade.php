<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録一覧</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">登録一覧</h1>
        <ul class="list-group">
            @foreach ($registers as $word)
                <li class="list-group-item d-flex justify-content-between">
                    <p class="fs-5">{{$word->name}}</p>
                    <div class="text-end">
                        <span><a href="" class="btn btn-primary">編集</a></span>
                        <span><a href="" class="btn btn-danger">削除</a></span>
                    </div>
                </li>
            @endforeach
        </ul>

        <a href="{{route('home')}}" class="btn btn-primary mt-5">戻る</a>
    </div>
</body>
</html>
