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
        <header class="d-flex justify-content-end p-4">
            <div class="me-3">
                <p class="fs-4">login:{{Auth::user()->name}}</p>
            </div>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">ログアウト</button>
            </form>
        </header>

        <main class="mt-5">
            {{-- タイトル--}}
            <h1 class="text-center fw-bold">NameMaker</h1>
            {{-- メニュー --}}
            <div class="text-end">
                <a href="{{route('addName')}}" class="btn btn-primary">名前登録</a>
                <a href="{{route('index')}}" class="btn btn-primary">登録一覧</a>
            </div>

            {{-- 名前表示 --}}
            <div class="d-flex justify-content-evenly mt-5">
                {{-- 左の名前 --}}
                <div class="text-center">
                    {{-- 名前表示 --}}
                    <div style="width: 300px; height:80px; line-height:80px" class="border border-dark rounded">
                        @if (session()->has('leftName'))
                            <p class="text-center fs-4">
                                {{session()->get('leftName')}}
                            </p>
                        @endif
                    </div>
                    {{-- ボタン --}}
                    <form action="{{route('outputName')}}" method="POST">
                        @csrf
                        <input type="hidden" name="leftRight" value="0">
                        <button class="btn btn-primary mt-4" style="width: 100px">出力</button>
                    </form>
                </div>

                <div>
                    <form action="{{route('hideName')}}" method="GET">
                        <button type="submit" class="btn btn-warning">両方消す</button>
                    </form>
                </div>
                {{-- 右の名前 --}}
                <div class="text-center">
                    {{-- 右の名前表示 --}}
                    <div style="width: 300px; height:80px; line-height:80px" class="border border-dark rounded">
                        @if (session()->has('rightName'))
                            <p class="text-center fs-4">
                                {{session()->get('rightName')}}
                            </p>
                        @endif
                    </div>
                    {{-- ボタン --}}
                    <form action="{{route('outputName')}}" method="POST">
                        @csrf
                        <input type="hidden" name="leftRight" value="1">
                        <button class="btn btn-primary mt-4" style="width: 100px">出力</button>
                    </form>
                </div>
            </div>

            {{-- 文字数設定 --}}
            <form action="" method="POST" class="mt-5">
                @csrf
                <label for="letter" class="form-label fw-bold fs-5">文字数設定</label>
                <select name="letterCount" id="letter" class="form-select">
                    <option value="all">制限なし</option>
                    @for ($i = 2; $i < 30; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <button type="submit" class="btn btn-primary mt-3">登録</button>
            </form>
        </main>
    </div>
</body>
</html>
