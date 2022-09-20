<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>

    <style>
        body{
            margin: 40px;
            padding: 0;
        }
    </style>

</head>
<body>

    <!-- バリデーション -->
    @if($errors->any())
    <div class="alert alert-info" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

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
                            <a class="nav-link active" aria-current="page" href="#">お問合せフォーム項目設定</a>
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

        <h1>お問合せフォーム　項目設定</h1>

        <form action="{{ route('category_register') }}" method="POST">
        @csrf

            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label">項目</label>
                <input type="text" name="name" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">設定</button>

        </form>

    </div>

    <div class="container">

        @if (Session::has('delete_message'))
            <p class="alert alert-success">{{ session('delete_message') }}</p>
        @endif

        <table class="table table-striped" style="margin-top: 20px;">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">項目名</th>
                <th scope="col">設定日</th>
                <th scope="col">削除</th>
            </tr>
            </thead>
            <tbody>

                @foreach($category_all as $category)

                    <tr>

                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $category->checkbox_name  }}</td>
                        <td>{{ $category->created_at  }}</td>
                        <td>
                            <form action="{{ route('category_delete',$category->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">削除</button>
                            </form>
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
