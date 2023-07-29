<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>名前登録</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div class="container py-5">
        <h1 class="fw-blod text-center">名前登録</h1>

        <form action="{{route('DBaddName')}}" method="POST">
            @csrf
            <label for="name" class="form-label">単語入力</label>
            <input type="text" id="name" name="name" class="form-control">
            @if ($errors->has('name'))
                <p class="alert alert-danger">{{$errors->first()}}</p>
            @endif

            <label for="leftRight">左右どっちに表示させるか選んでください</label>
            <select name="leftRight" class="form-select">
                <option value="0">左</option>
                <option value="1">右</option>
            </select>

            <button type="submit" class="btn btn-primary mt-3">登録</button>
            {{-- 戻る --}}
            <a href="{{route('home')}}" class="btn btn-primary mt-3">戻る</a>
        </form>

        {{-- ユーザー登録成功メッセージ --}}
        <x-alert type="primary" :session="session('message')" />

    </div>
</body>
</html>
