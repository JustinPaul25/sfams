@extends('layouts.app')

@section('content')
    <students :levels="{{ json_encode($levels) }}" :branches="{{ json_encode($branches) }}"></students>
@endsection
