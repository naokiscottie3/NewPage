@extends('layout.default')

@section('title','お客様お問合せ情報')

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

        <h1 class="title" style="margin-bottom: 20px;">お問合せ詳細</h1>

        <div class="mb-4">
            <label for="">お問合せ日時：</label>
            <span>{{ $detail_content->created_at }}</span>
        </div>
        <div class="mb-4">
            <label for="">名前：</label>
            <span>{{ $detail_content->name }}</span>
        </div>
        <div class="mb-4">
            <label for="">email：</label>
            <span>{{ $detail_content->email }}</span>
        </div>
        <div class="mb-4">
            <label for="">項目：</label>
            @foreach ($category as $item)
                <p style="margin-top: 10px">{{ $item }}</p>
            @endforeach
        </div>
        <div class="mb-4">
            <label for="">お問合せ内容：</label>
            <div style="background-color:whitesmoke;margin-top: 10px;height:250px">{{ $detail_content->message }}</div>
        </div>

        <div class="mb-4">
            <a href="/reply/{{ $detail_content->id }}" type="button" class="btn btn-primary">reply</a>
        </div>
        <div class="mb-4">
            <a href="{{ route('home') }}" type="button" class="btn btn-primary">戻る</a>
        </div>
    </div>


@endsection

