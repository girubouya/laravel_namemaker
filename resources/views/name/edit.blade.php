<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">編集画面</h1>

        <form action="{{route('update',$editData)}}" method="POST">
            @csrf
            <label for="name" class="form-label">単語入力</label>
            <input type="text" id="name" name="name" class="form-control" value="{{$editData->name}}">
            @if ($errors->has('name'))
                <p class="alert alert-danger">{{$errors->first()}}</p>
            @endif

            <label for="leftRight">左右どっちに表示させるか選んでください</label>
            <select name="leftRight" class="form-select">
                <option value="0" {{$editData->leftRight==0 ? 'selected':''}}>左</option>
                <option value="1" {{$editData->leftRight==1 ? 'selected':''}}>右</option>
            </select>

            <button type="submit" class="btn btn-primary mt-3">編集</button>
            {{-- 戻る --}}
            <a href="{{route('index')}}" class="btn btn-primary mt-3">戻る</a>
        </form>
    </div>
</body>
</html>
