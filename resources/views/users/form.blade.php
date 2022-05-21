@extends('layouts.app')

@section('content')
    <user-form :type="{{ json_encode($type) }}" :user="{{ json_encode($user) }}"></user-form>
@endsection