@extends('layouts.app')

@section('content')
    <enrollment-application :levels="{{ json_encode($levels) }}"/>
@endsection