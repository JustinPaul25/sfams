@extends('layouts.app')

@section('content')
    <div class="bg-blue-100">
        <student-profile :student="{{ json_encode($student) }}"/>
    </div>
@endsection