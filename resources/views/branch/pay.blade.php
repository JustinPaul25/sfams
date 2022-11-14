@extends('layouts.app')

@section('content')
    <branch-pay :branch={{ json_encode($branch) }}></branch-pay>
@endsection