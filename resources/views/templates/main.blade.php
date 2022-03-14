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
            <div class="header__logo-small">Зупинемо орків разом!</div>
        </a>

        <div class="header__counters">
            <div class="header__counter-item">
                <div class="header__counter-item-title">
                    <div class="header__counter-item-title-text">Знайдені соц.мережі</div>
                    <div class="header__counter-item-title-number">{{count(\App\Models\OrcInfo::whereHas('orcs')->get())}}<span>із&nbsp;120&nbsp;000</span></div>
                </div>
                <a href="{{route('find')}}" class="header__counter-item-button">Знайти</a>
            </div>

            <div class="header__counter-item">
                <div class="header__counter-item-title">
                    <div class="header__counter-item-title-text">Написано окупантам</div>
                    <div class="header__counter-item-title-number">{{count(\App\Models\OrcInfo::where('is_checked', 1)->get())}}<span>із&nbsp;120&nbsp;000</span></div>
                </div>
                <a href="{{route('send')}}" class="header__counter-item-button">Написати</a>
            </div>
        </div>
    </div>

</header>

@yield('content')


<script src="/main.js"></script>

</body>
</html>
