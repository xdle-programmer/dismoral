@extends('templates.main')

@section('content')

    <?php
    $titleClassName = 'occupant-send__title-wrapper--done';
    $titleStatusName = 'Знайшли та написали';
    $wrapperClass = 'occupant-send';
    $prevOrcButton = '<div></div>';
    $nextOrcButton = '<div></div>';

    if (count($orc->orcs) === 0) {
        $titleClassName = 'occupant-send__title-wrapper--not-find';
        $titleStatusName = 'Потрібно знайти';
        $wrapperClass = 'occupant';
    } else if (!$orc->is_checked) {
        $titleClassName = 'occupant-send__title-wrapper--not-send';
        $titleStatusName = 'Потрібно написати. Після того, як ви написали, обов\'язково натисніть "Написав"';
    }


    if ($prevOrc) {
        $prevOrcButton = '<a href="/occupant/item/' . $prevOrc->id . '" class="occupant-send__change-button">< Попередній окупант</a>';
    }

    if ($nextOrc) {
        $nextOrcButton = '<a href="/occupant/item/' . $nextOrc->id . '" class="occupant-send__change-button">Наступний окупант ></a>';
    }

    ?>

    <div class="<?= $wrapperClass; ?> layout" data-orc-id="{{$orc->id}}">

        <div class="occupant-send__buttons">
            <?= $prevOrcButton; ?>
            <?= $nextOrcButton; ?>
        </div>

        <div class="occupant-send__title-wrapper <?= $titleClassName; ?>">
            <div class="occupant-send__title">Окупант: {!!  $orc->fio!!}</div>
            <div class="occupant-send__mark"><?= $titleStatusName; ?></div>
        </div>


        @if(count($orc->orcs)===0)
            @include('components.find',['orc'=>$orc])
        @else
            @include('components.send',['orc'=>$orc])
        @endif

    </div>

@endsection
