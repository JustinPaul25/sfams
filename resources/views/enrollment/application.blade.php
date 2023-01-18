@extends('layouts.app')

@section('content')
    <enrollment-application :levels="{{ json_encode($levels) }}" :branches="{{ json_encode($branches) }}"/>
@endsection
