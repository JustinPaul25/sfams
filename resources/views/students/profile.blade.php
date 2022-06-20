@extends('layouts.app')

@section('content')
    <student-view :student="{{ json_encode($student) }}"/>
@endsection