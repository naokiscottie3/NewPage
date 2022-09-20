@extends('layout.default')

@section('title','home')

@section('content')
<div class="container" style="margin-bottom: 20px;margin-top: 20px;">
    @if (Session::has('message'))
        <p class="alert alert-success">{{ session('message') }}</p>
    @endif
</div>
<div class="container" style="margin-bottom: 20px;">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mail List home</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">mail boxホーム</a>
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
    <div style="display: flex;justify-content: end;">



        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

    </div>





    <table class="table table-striped" style="margin-top: 20px;">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">日付</th>
            <th scope="col">お客様名</th>
            <th scope="col">email</th>
            <th scope="col">reply</th>
            <th scope="col">詳細</th>
            <th scope="col">返信履歴</th>
            <th scope="col">削除</th>
        </tr>
        </thead>
        <tbody>

            @foreach($datas as $data)

                <tr>

                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $data-> created_at }}</td>
                    <td>{{ $data->name  }}</td>
                    <td>{{ $data->email }}</td>

                    @if($data->reply_check == 0)
                        <td style="background-color:lightpink ">未返信</td>
                    @else
                        <td>返信済み</td>
                    @endif

                    <td>
                        <form action="{{ route('detail') }}" method="POST">
                            @csrf
                            <input hidden name="id" value="{{ $data->id }}">
                            <button type="submit" class="btn btn-primary">詳細</button>
                        </form>
                    </td>
                    <td>
                        <a href="/reply_history/{{ $data->id }}" class="btn btn-success">履歴</a>
                    </td>
                    <td>
                        <form action="{{ route('message_delete') }}" method="POST">
                            @csrf
                            <input hidden name="id" value="{{ $data->id }}">
                            <button type="submit" class="btn btn-secondary">削除</button>
                        </form>
                    </td>



                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection

