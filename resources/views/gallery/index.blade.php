@extends('layouts.app')

@section('title', 'Галерея')

@section('sidebar')
    @parent
@endsection

@section('content')
    <x-user.projects :projects="$projects"/>
@endsection
