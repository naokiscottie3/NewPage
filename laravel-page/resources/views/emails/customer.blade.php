下記のお問合せを受け付けました。
後日、弊社の方からご連絡いたします。

【お問い合わせ内容】
お名前: {{ $data->name }}

メールアドレス: {{ $data->email }}

項目：
@foreach ($data2 as $a)
{{ $a->checkbox_name }}
@endforeach

お問い合わせ内容:
{{ $data->message }}
