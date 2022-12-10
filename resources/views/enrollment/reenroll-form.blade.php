@extends('layouts.app')

@section('content')
    <re-enroll-form :student="{{ json_encode($student) }}" :fees="{{ json_encode($fees) }}" :levels="{{ json_encode($levels) }}" :sections="{{ json_encode($sections) }}"/>
@endsection