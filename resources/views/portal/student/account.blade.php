@extends('layouts.app')

@section('content')
    <student-account :account="{{ json_encode($account) }}" :student="{{ json_encode($student) }}"/>
@endsection