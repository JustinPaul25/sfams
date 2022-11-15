@extends('layouts.app')

@section('content')
    <branch-view :branch="{{ json_encode($branch) }}" :account="{{ json_encode($account) }}" :transactions="{{ json_encode($transactions) }}"></branch-view>
@endsection