@extends('templates.main')

@section('content')

    <div class="send-empty layout">
        <div class="send-empty__title">Всім окупантам яких ми знайшли в соціальних мережах, вже написали.</div>

        <a href="{{route('find')}}" class="send-empty__link button">Знайти окупанта</a>

    </div>

@endsection
