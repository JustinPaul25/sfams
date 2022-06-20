@extends('layouts.app')

@section('content')
    <student-form :levels="{{ json_encode($levels) }}" :branches="{{ json_encode($branches) }}"></student-form>
@endsection