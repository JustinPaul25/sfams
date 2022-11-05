@extends('layouts.app')

@section('content')
    <student-form :levels="{{ json_encode($levels) }}"></student-form>
@endsection