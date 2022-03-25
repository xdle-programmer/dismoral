@extends('templates.main')

@section('content')

    <div class="hello layout">
        @include('components.list',['orcs'=>$orcs,'total'=>$total,'type'=>$type,'skip'=>$skip])
    </div>
@endsection
