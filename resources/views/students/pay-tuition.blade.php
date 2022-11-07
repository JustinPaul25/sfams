@extends('layouts.app')

@section('content')
    <student-pay-tuition :student="{{ json_encode($student) }}"></student-pay-tuition>
@endsection