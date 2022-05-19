@extends('layouts.app')

@section('title', auth()->user()->name )

@section('sidebar')
    @parent
@endsection

@section('content')
    <p class="p">Здесь будет личный кабинет пользователя</p>
@endsection
