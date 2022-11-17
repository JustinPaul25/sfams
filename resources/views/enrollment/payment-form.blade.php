@extends('layouts.app')

@section('content')
    <enrollment-payment-form :student="{{ json_encode($student) }}" :levels="{{ json_encode($levels) }}" :fees="{{ json_encode($fees) }}" :requirements="{{ json_encode($requirements) }}" :sections="{{ json_encode($sections) }}"/>
@endsection