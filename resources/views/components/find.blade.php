<div class="occupant__text">{{$orc->person}}</div>
<div class="occupant__text">Знайдіть цю людину в VK та збережіть посилання на профіль. Якщо ви
    вагаєтесь, чи це окупант чи ні, запевняємо вас нічого страшного. Навіть якщо ми напишемо не окупанту, не
    переймайтесь «сарафанное» людьське радіо неодмінно спрацює.
</div>
<div class="occupant__inputs">

</div>
<div class="occupant__button-more">+ Додати ще одне посилання</div>

<div class="occupant__button occupant__button--save button">Зберегти</div>

<div class="occupant__helps">
    <div class="occupant__helps-item">
        <div class="occupant__helps-item-title">Як скопіювати посилання в VK</div>
        <div class="occupant__helps-item-images">
            <img class="occupant__helps-item-image" src="/images/vk_1.jpg">
            <img class="occupant__helps-item-image" src="/images/vk_2.jpg">
        </div>
    </div>
</div>

<template class="input-item-template">
    <div class="occupant__input-item">
        <div class="occupant__input-item-inner">
            <div class="placeholder">
                <input class="input placeholder__input" placeholder="Посилання" data-orc-link>
                <div class="placeholder__item">Посилання</div>
            </div>
        </div>

        <div class="occupant__input-item-inner occupant__input-item-inner--comment">
            <div class="placeholder">
                <input class="input placeholder__input" placeholder="Коментар" data-orc-comment>
                <div class="placeholder__item">Коментар</div>
            </div>
        </div>
    </div>
</template>
