<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anti orcs</title>
    <link rel="stylesheet" type="text/css" href="/main.css">
</head>
<body>

<header class="header">
    <div class="layout header__block">
        <a href="/" class="header__logo">
            <div class="header__logo-big">Anti orcs</div>
            <div class="header__logo-small">Остановим орков вместе!</div>
        </a>

        <div class="header__counters">
            <div class="header__counter-item">
                <div class="header__counter-item-title">
                    <div class="header__counter-item-title-text">Найдено соцсетей</div>
                    <div class="header__counter-item-title-number">0</div>
                </div>
                <a href="{{route('find')}}" class="header__counter-item-button">Найти</a>
            </div>

            <div class="header__counter-item">
                <div class="header__counter-item-title">
                    <div class="header__counter-item-title-text">Написано оккупантам</div>
                    <div class="header__counter-item-title-number">0</div>
                </div>
                <a href="{{route('send')}}" class="header__counter-item-button">Написать</a>
            </div>
        </div>
    </div>

</header>

@yield('content')


<script src="/main.js"></script>

</body>
</html>
