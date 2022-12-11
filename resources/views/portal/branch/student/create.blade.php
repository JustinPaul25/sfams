@extends('layouts.app')

@section('content')
    <branch-student-create :levels="{{ json_encode($levels) }}"/>
@endsection