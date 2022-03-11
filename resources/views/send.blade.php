@extends('templates.main')

@section('content')

    <div class="occupant-send layout" data-orc-id="{{$orc->id}}">
        <div class="occupant-send__title">Оккупант: {!!  $orc->fio!!}</div>

        <div class="occupant-send__items">

            <div class="occupant-send__links">
                <div class="occupant-send__links-title">Социальные сети оккупанта</div>

                <?php foreach ($orc->orcs as $orcLink): ?>

                <div class="occupant-send__link-wrapper">
                    <a href="<?= $orcLink->link ?>" class="occupant-send__link"><?= $orcLink->link ?></a>
                    <div class="occupant-send__link-comment"><?= $orcLink->comment; ?></div>
                </div>

                <?php endforeach; ?>

                <div class="occupant-send__button button">Написал</div>
            </div>

            <div class="occupant-send__info">
                <div class="occupant-send__info-title">Что написать?</div>
                <div class="occupant-send__info-text">Выберите 5-10 фотографий и напишите два-три слова на русском. Достаточно написать: "Убитые русские солдаты в Украине" или
                    "Мертвые русские срочники".
                </div>
                <div class="occupant-send__info-text">Не нужно вступать в переписки. Не нужно доказывать, что они виноваты или объяснять им что-то. Они не поймут.</div>
                <div class="occupant-send__info-text">Наша задача - поддержать страх, заставить думать о том, как дезертировать, как отказаться, как сдаться в плен. Чтобы мамы,
                    жены и дети оккупантов звонили им и рассказывали, какие страшные фотографии они увидели и просили вернуться домой.
                </div>


                <div class="occupant-send__info-images">


                    <?php for ($index = 1;$index < 31;$index++): ?>

                    <a href="/images/occupants/<?= $index ?>.jpg" target="_blank" class="occupant-send__info-image-link">
                        <img src="/images/occupants/<?= $index ?>.jpg" class="occupant-send__info-image">
                    </a>

                    <?php endfor; ?>


                </div>
            </div>

        </div>
    </div>

@endsection
