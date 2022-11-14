@extends('layouts.app')

@section('content')
    <branch-view :branch="{{ json_encode($branch) }}"></branch-view>
@endsection