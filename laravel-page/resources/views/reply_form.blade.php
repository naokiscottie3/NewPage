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

    <title>reply</title>

    <style>
        body{

            padding: 0;
            margin: 40px;
            background-color:azure;

        }
    </style>

</head>
<body>

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
        <h1 style="margin-bottom: 20px;">返信フォーム</h1>
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-4">
            <label>お客様名：</label>{{ $data->name }}
        </div>

        <div class="mb-4">
            <label>email：</label>{{ $data->email }}
        </div>

        <form action="/reply_email" method="POST">
        @csrf
            <!-- id input -->
            <input type="hidden" name="id" value="{{ $id }}">
            <!-- Name input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form4Example1">件名</label>
              <input type="text" name="title" id="form4Example1" class="form-control" value = "{{ old('title') }}"/>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form4Example3">本文</label>
              <textarea class="form-control" name="message" id="form4Example3" rows="4">{{ old('message') }}</textarea>
            </div>


            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">送信</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
