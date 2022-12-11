@extends('layouts.app')

@section('content')
    @if (auth()->user()->isStudent())
        <student-dashboard :student="{{ json_encode($student) }}"></student-dashboard>
    @elseif (auth()->user()->isBranch())
    <branch-dashboard :branch="{{ json_encode($branch) }}" :students="{{ json_encode($students) }}"></branch-dashboard>
    @else
        <dashboard></dashboard>
    @endif
@endsection
