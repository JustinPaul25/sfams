@extends('layouts.app')

@section('content')
    <student-edit :student="{{ json_encode($student) }}"></student-edit>
@endsection