@extends('templates.main')

@section('content')

    <div class="occupant-send layout">
        <div class="occupant-send__title">{!!  $orc->fio!!}</div>


        <div class="occupant-send__text">Напишите оккупанту</div>


        <div class="occupant-send__items">

            <div class="occupant-send__links">

                <?php foreach ($orc->orcs as $orcLink): ?>

                <div class="occupant-send__link">
                    <div class="occupant-send__link"></div>
                </div>
                <?php print_r($orcLink->link); ?>
                <?php print_r($orcLink->net); ?>
                <?php print_r($orcLink->comment); ?>

                <?php endforeach; ?>

            </div>

            <div class="occupant-send__info">
                <div class="occupant-send__info-title">Что написать</div>
                <div class="occupant-send__info-text">Что написать</div>

            </div>

        </div>

        <div class="occupant-send__button button">Написал</div>
    </div>

@endsection
