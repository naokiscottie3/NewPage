
下記の内容でお問い合わせがありました。
内容を確認しご対応をお願いします。

【お問い合わせ内容】
お名前: {{ $data->name }}

メールアドレス: {{ $data->email }}

項目：
@foreach ($data2 as $a)
{{ $a->checkbox_name }}
@endforeach

お問い合わせ内容:
{{ $data->message }}
