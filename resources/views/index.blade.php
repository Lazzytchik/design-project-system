@extends('layouts.app')

@section('title', 'Главная')

@section('sidebar')
    @parent
@endsection

@section('content')

    @if(session()->has('success'))
        <div>
            <p>{{session('success')}}</p>
        </div>
    @endif
    <p class="p">Немного контента</p>
@endsection
