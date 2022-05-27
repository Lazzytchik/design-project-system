@extends('layouts.app')

@section('title', 'Новый проект')

@section('sidebar')
    @parent
@endsection

@section('content')
    <x-user.projects.new :disciplines="$disciplines"/>
@endsection
