@extends('templates.main')

@section('content')

    <div class="hello layout">
        <div class="hello__title">Окупанти бояться!</div>
        <div class="hello__text">І правильно - ЗСУ день за днем знищують їх . Давайте разом допоможемо ЗСУ - остаточно залякати ворога.</div>

        <div class="hello__faq">
            <div class="hello__faq-item">
                <div class="hello__faq-item-title">Як?</div>
                <div class="hello__faq-item-text">Як? В січні видавництво «Укарїнська правда» опублікувала список 120 000 військовослужбовців російської окупаційної  армії . Знайдемо їх в соціальних мережах , будемо знаходити не тільки цих орків а і батьків , жінок та друзів і будемо надсилати їм фотографії та відео того як окупантів розбивають на шматки наші ЗСУ.</div>
            </div>
            <div class="hello__faq-item">
                <div class="hello__faq-item-title">Навіщо?</div>
                <div class="hello__faq-item-text">Для того щоб залякати та деморалізувати ворога. Окупанти знають, що вони не на навчаннях, вони виконують криваві накази відкриваючи вогонь по мирним громадянам. Ми до них не достукаємось, але ми можемо їх налякати.</div>
            </div>
            <div class="hello__faq-item">
                <div class="hello__faq-item-title">Що я можу для цього зробити?</div>
                <div class="hello__faq-item-text">Знайти окупанта та його близьких в соціальних мережах і надіслати фотографії того, що буде з ними на нашій землі.</div>
            </div>
        </div>

        <div class="hello__buttons">
            <a href="{{route('find')}}" class="hello__button button">Знайти окупанта</a>
            <a href="{{route('send')}}" class="hello__button button">Написати окупанту</a>
        </div>
    </div>

@endsection
