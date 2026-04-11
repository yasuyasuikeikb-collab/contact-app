<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks</title>
    <link rel="stylesheet" href="{{ asset('css/common/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/thanks.css') }}">
</head>
<body>
    <section class="thanks-page">
        <div class="thanks-page__background-text">Thank you</div>

        <div class="thanks-page__inner">
            <p class="thanks-page__message">お問い合わせありがとうございました</p>
            <a class="thanks-page__button" href="{{ route('contact.index') }}">HOME</a>
        </div>
    </section>
</body>
</html>