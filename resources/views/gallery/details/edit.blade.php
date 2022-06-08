@extends('layouts.app')

@section('title', $project->name)

@section('sidebar')
    @parent
@endsection

@section('content')
    <x-projects.details.edit :project="$project" :disciplines="$disciplines"/>
@endsection
