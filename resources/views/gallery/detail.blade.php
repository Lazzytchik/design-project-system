@extends('layouts.app')

@section('title', $project->name)

@section('sidebar')
    @parent
@endsection

@section('content')
    <x-projects.details :project="$project"/>
@endsection
