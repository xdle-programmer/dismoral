@extends('templates.main')

@section('content')

    <div class="hello layout">
        <div class="hello__title">Окупанти бояться!</div>

        <div class="hello__text">
            І правильно - ЗСУ день за днем знищують їх . Давайте разом допоможемо ЗСУ - остаточно залякати ворога.
            Знайти окупанта та його близьких в соціальних мережах і надіслати фотографії того, що буде з ними на нашій
            землі.
        </div>

        @include('components.list',['orcs'=>$orcs,'total'=>$total,'type'=>'all','skip'=>$skip])

    </div>

@endsection
