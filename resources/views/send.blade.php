@extends('templates.main')

@section('content')

    <div class="occupant-send layout" data-orc-id="{{$orc->id}}">

        <div class="occupant-send__title">Окупант: {!!  $orc->fio!!}</div>

        <div class="occupant-send__items">

            <div class="occupant-send__links">
                <div class="occupant-send__links-title">Соціальні мережі окупанта</div>

                <?php foreach ($orc->orcs as $orcLink): ?>

                <div class="occupant-send__link-wrapper">
                    <a href="<?= $orcLink->link ?>" class="occupant-send__link"><?= $orcLink->link ?></a>
                    <div class="occupant-send__link-comment"><?= $orcLink->comment; ?></div>
                </div>

                <?php endforeach; ?>

                <div class="occupant-send__button button">Написав</div>
            </div>

            <div class="occupant-send__info">
                <div class="occupant-send__info-title">Що потрібно писати?</div>
                <div class="occupant-send__info-text">Оберіть 5-10 фотознімків і напишіть декілька слів російською
                    мовою. Буде достатньо написати: «Убитые русские солдаты в Украине» або «Мертвые русские срочники»
                </div>
                <div class="occupant-send__info-text">Не треба вступати з ними в діалог, нічого не пояснюйте, вони все
                    одно нічого не зрозуміють.
                </div>
                <div class="occupant-send__info-text">Наша задача - підтримувати страх, заставити їх думати про те як
                    здатись в полон. Щоб матері, жінки, діти окупантів дзвонили їм і розповідали, які страшні фотографії
                    вони отримали і просили своїх солдат повернутись додому.
                </div>


                <div class="occupant-send__info-images">


                    <?php for ($index = 1;$index < 31;$index++): ?>

                    <a href="/images/occupants/<?= $index ?>.jpg" target="_blank"
                       class="occupant-send__info-image-link">
                        <img src="/images/occupants/<?= $index ?>.jpg" class="occupant-send__info-image">
                    </a>

                    <?php endfor; ?>


                </div>
            </div>

        </div>
    </div>

@endsection
