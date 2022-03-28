@extends('templates.main')

@section('content')

    <div class="send-empty layout">
        <div class="send-empty__title">Всіх окупантів вже знайшли у соціальних мережах.</div>

        <a href="{{route('send')}}" class="send-empty__link button">Написати окупанту</a>

    </div>

@endsection
