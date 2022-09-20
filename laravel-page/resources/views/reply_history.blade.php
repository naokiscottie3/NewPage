@extends('layout.default')

@section('title','reply_history')

@section('content')

<div class="container" style="margin-bottom: 20px;">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mail List</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">mail boxホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/category_register">お問合せフォーム項目設定</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login_register">管理者登録</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" name="a_form">
                            @csrf
                            <a class="nav-link" onclick="document.a_form.submit();">Logout</a>
                        </form>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</div>

<div class="container">

    @if (Session::has('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
    @endif
    <h1>Home</h1>


    <table class="table table-striped" style="margin-top: 20px;">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">日付</th>
            <th scope="col">タイトル</th>
            <th scope="col">詳細表示</th>
            <th scope="col">削除</th>
        </tr>
        </thead>
        <tbody>

            @foreach($reply_emails as $item)

                <tr>

                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $item-> created_at }}</td>
                    <td>{{ $item->title  }}</td>

                    <td>
                        <a href="/reply_history_detail/{{ $data->id }}/{{ $item->id }}" class="btn btn-success">詳細</a>
                    </td>

                    <td>
                        <form action="{{ route('reply_delete') }}" method="POST">
                            @csrf
                            <input hidden name="id_1" value="{{ $item->id }}">
                            <input hidden name="id_2" value="{{ $data->id }}">
                            <button type="submit" class="btn btn-secondary">削除</button>
                        </form>
                    </td>

                </tr>

            @endforeach



        </tbody>

    </table>

    @if(isset($mail_detail))

        <h1 class="title" style="margin-bottom: 20px;">返信メール詳細</h1>

        <div class="mb-4">
            <label for="">返信日時：</label>
            <span>{{ $mail_detail->created_at }}</span>
        </div>
        <div class="mb-4">
            <label for="">タイトル：</label>
            <span>{{ $mail_detail->title }}</span>
        </div>
        <div class="mb-4">
            <label for="">本文：</label>
            <div style="background-color:whitesmoke;margin-top: 10px;height:250px">{{ $mail_detail->message }}</div>
        </div>


    @endif

    <div class="mb-4">
        <a href="{{ route('home') }}" type="button" class="btn btn-primary">戻る</a>
    </div>


</div>

@endsection

