@extends('layouts.app')

@section('content')
    <branch-account :branch="{{ json_encode($branch) }}" :students="{{ json_encode($students) }}"/>
@endsection