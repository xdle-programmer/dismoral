@extends('templates.main')

@section('content')

    <div class="occupant layout" data-orc-id="{{$orc->id}}">
        <div class="occupant__title">{{$orc->fio}}</div>
        <div class="occupant__text">{{$orc->person}}</div>
        <div class="occupant__text">Найдите этого человека в соцсетях и сохраните ссылки на профили. Если вы сомневаетесь, он ли это - ничего страшного. Даже если мы напишем не
            оккупанту, сарафанное радио сработает.
        </div>
        <div class="occupant__inputs">

        </div>
        <div class="occupant__button-more">+ Добавить еще одну ссылку</div>

        <div class="occupant__button occupant__button--save button">Сохранить</div>

        <template class="input-item-template">
            <div class="occupant__input-item">
                <div class="occupant__input-item-inner">
                    <div class="placeholder">
                        <input class="input placeholder__input" placeholder="Ссылка" data-orc-link>
                        <div class="placeholder__item">Ссылка</div>
                    </div>
                </div>

                <div class="occupant__input-item-inner">
                    <select class="select" data-orc-net></select>
                </div>

                <div class="occupant__input-item-inner occupant__input-item-inner--comment">
                    <div class="placeholder">
                        <input class="input placeholder__input" placeholder="Комментарий" data-orc-comment>
                        <div class="placeholder__item">Комментарий</div>
                    </div>
                </div>
            </div>
        </template>

    </div>

@endsection
