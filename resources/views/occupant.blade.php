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

        <div class="occupant__helps">
            <div class="occupant__helps-item">
                <div class="occupant__helps-item-title">Как скопировать ссылку в контакте</div>
                <div class="occupant__helps-item-images">
                    <img class="occupant__helps-item-image" src="/images/vk_1.jpg">
                    <img class="occupant__helps-item-image" src="/images/vk_2.jpg">
                </div>
            </div>
            <div class="occupant__helps-item">
                <div class="occupant__helps-item-title">Как скопировать ссылку в instagram</div>
                <div class="occupant__helps-item-images">
                    <img class="occupant__helps-item-image" src="/images/inst_1.jpg">
                    <img class="occupant__helps-item-image" src="/images/inst_2.jpg">
                </div>
            </div>
            <div class="occupant__helps-item">
                <div class="occupant__helps-item-title">Как скопировать ссылку в facebook</div>
                <div class="occupant__helps-item-images">
                    <img class="occupant__helps-item-image" src="/images/fb_1.jpg">
                    <img class="occupant__helps-item-image" src="/images/fb_2.jpg">
                </div>
            </div>
        </div>

        <template class="input-item-template">
            <div class="occupant__input-item">
                <div class="occupant__input-item-inner">
                    <div class="placeholder">
                        <input class="input placeholder__input" placeholder="Ссылка" data-orc-link>
                        <div class="placeholder__item">Ссылка</div>
                    </div>
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
