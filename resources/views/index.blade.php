@extends('templates.main')

@section('content')

    <div class="hello layout">
        <div class="hello__title">Оккупанты боятся!</div>
        <div class="hello__text">И правильно - ВСУ день за днем уничтожает их. Давайте вместе поможем ВСУ - запугаем ворога окончательно.</div>

        <div class="hello__faq">
            <div class="hello__faq-item">
                <div class="hello__faq-item-title">Как?</div>
                <div class="hello__faq-item-text">В январе "Украинская правда" опубликовала список 120 000 военнослужащих российско-оккупационной армии. Найдем их в социальных сетях. Найдем родителей, жен, девушек и друзей. Пришлем фотографии и видео того, как оккупантов разбирают на кусочки.</div>
            </div>
            <div class="hello__faq-item">
                <div class="hello__faq-item-title">Зачем?</div>
                <div class="hello__faq-item-text">Испуганного, деморализованного врага легче бить.</div>
            </div>
            <div class="hello__faq-item">
                <div class="hello__faq-item-title">Может быть объяснить, что их обманывают?</div>
                <div class="hello__faq-item-text">Они все знают. Они знают, что это не учения. Они знают, что стреляют по мирным жителям. Мы не достучимся до них, мы можем их только запугать.</div>
            </div>
            <div class="hello__faq-item">
                <div class="hello__faq-item-title">Что я могу сделать?</div>
                <div class="hello__faq-item-text">Найти оккупанта и его близких в социальных сетях. Прислать фотографии того, во что их превращают на нашей земле.</div>
            </div>
        </div>

        <div class="hello__buttons">
            <a href="{{route('find')}}" class="hello__button button">Найти оккупанта</a>
            <a href="{{route('send')}}" class="hello__button button">Написать оккупанту</a>
        </div>
    </div>

@endsection
