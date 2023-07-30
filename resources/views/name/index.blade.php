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

        {{-- 名前削除メッセージ --}}
        <x-alert type="primary" :session="session('message')" />

        <table class="table">
            <thead>
                <tr><th>名前</th><th>左右</th><th>編集</th><th>削除</th></tr>
            </thead>
            <tbody>
                @foreach ($registers as $word)
                    <tr>
                        <td><p class="fs-5">{{$word->name}}</p></td>
                        <td><p class="fs-5">{{$word->leftRightChange($word->leftRight)}}</p></td>
                        <td><a href="{{route('edit',['id'=>$word->id])}}" class="btn btn-primary">編集</a></td>
                        <td>
                            <form action="{{route('delete',$word)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{route('home')}}" class="btn btn-primary mt-5">戻る</a>
    </div>
</body>
</html>
