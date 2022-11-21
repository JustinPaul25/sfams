@extends('layouts.app')

@section('content')
    <branch-account :branch="{{ json_encode($branch) }}"/>
@endsection