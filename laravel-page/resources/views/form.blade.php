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
    <link rel="stylesheet" href="{{ asset('css/test_css.css') }}">
    <title>Document</title>

    <style>
        body{

            padding: 0;
            margin: 40px;
            background-color:azure;

        }
    </style>

</head>
<body>

    <div class="container">
        @if (Session::has('message'))
            <p class="alert alert-success">{{ session('message') }}</p>
        @endif
        <h1 style="margin-bottom: 20px;">お問合せフォーム</h1>
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('contact_form_register') }}" method="POST">
        @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form4Example1">Name</label>
              <input type="text" name="name" id="form4Example1" class="form-control" value = "{{ old('name') }}"/>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form4Example2">Email address</label>
              <input type="email" name="email" id="form4Example2" class="form-control" value = "{{ old('email') }}"/>
            </div>

            <div class="mb-4">
            <!-- check box -->
            @foreach($categories as $category)

                <input class="form-check-input" type="checkbox" name="category[]" id="category"  value="{{ $category->id }}"
                @if(is_array(old('category')) && in_array($category->id,old('category')))
                checked
                @endif
                >
                <label for="category">
                    {{ $category->checkbox_name  }}
                </label>

            @endforeach
            </div>



            <!-- Message input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form4Example3">Message</label>
              <textarea class="form-control" name="message" id="form4Example3" rows="4">{{ old('message') }}</textarea>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" name="email_check" value="checked" id="email_check"
              @if($errors->any())
                @if(old('email_check'))
                    @if(old('email_check') == "checked")
                        checked
                    @endif
                @endif
              @else
                checked
              @endif

              >
              <label class="form-check-label" for="email_check">
                Send me a copy of this message
              </label>

            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">送信</button>
        </form>

        <a class="btn btn-primary" href="{{ route('home_page') }}" role="button">戻る</a>
    </div>
    <!--
        <script src="{{ asset('js/test.js') }}"></script>
    -->

</body>
</html>
