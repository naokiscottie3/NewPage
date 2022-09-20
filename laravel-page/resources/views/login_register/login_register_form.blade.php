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
        }
        .space_first{
            margin-top: 40px;
        }

    </style>

</head>
<body>

    <!-- バリデーション -->
    @if($errors->any())
    <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-red-400">{{ $error }}</li>
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
                            <a class="nav-link" href="/category_register">お問合せフォーム項目設定</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">管理者登録</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">ホームページ</a>
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


        <h1>管理者登録</h1>

        <form action="{{ route('login_register') }}" method="POST">
            @csrf


            <!-- Name input -->
            <div class="form-outline mb-4">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control"  name="email"/>
            </div>

            <!-- password input -->
            <div class="form-outline mb-4">
              <label class="form-label">password</label>
              <input type="password" class="form-control"  name="password"/>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
        </form>

    </div>

    <div class="container space_first">

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">名前</th>
                <th scope="col">email</th>
                <th scope="col">削除</th>
            </tr>
            </thead>
            <tbody>

                @foreach($users as $user)

                    <tr>

                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email  }}</td>
                        <td>
                            <form action="{{ route('user_delete') }}" method="POST">
                                @csrf
                                <input hidden name="id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-secondary">削除</button>
                            </form>
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <script>

    const url = '{{ route('login_show') }}';

    //パスワードの決定
    const password_key = 1914;


    function check() {
        var UserInput;
        UserInput = prompt("パスワードを入力して下さい:");
        result = check_pass(UserInput);
        if(!result){
            window.location.href = url;
        }
    }

    function check_pass(password){
        if(password == password_key){
            return true;
        }else{
            false;
        }
    }

    check();


    </script>



</body>
</html>
