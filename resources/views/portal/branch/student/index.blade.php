@extends('layouts.app')

@section('content')
    <branch-student :levels="{{ json_encode($levels) }}" :branches="{{ json_encode($branches) }}"/>
@endsection