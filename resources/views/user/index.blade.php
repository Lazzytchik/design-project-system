@extends('layouts.app')

@section('title', auth()->user()->name )

@section('sidebar')
    @parent
@endsection

@section('content')
    <x-user.projects :user-id="auth()->user()->id"/>
@endsection
