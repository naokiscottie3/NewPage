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
        body {
            margin: 40px;
            padding: 0;
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
                            <a class="nav-link" href="/">ホームページ</a>
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

        @if (Session::has('delete_message'))
        <p class="alert alert-success">{{ session('delete_message') }}</p>
        @endif

        <h1 style="margin-bottom: 20px">管理者ログイン</h1>

        <form action="{{ route('login_check') }}" method="POST">
        @csrf

        <!-- バリデーション -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-red-400">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif




            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control"  name="email" value="{{ old('email') }}"/>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label">password</label>
              <input type="password" class="form-control"  name="password"/>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
          </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
