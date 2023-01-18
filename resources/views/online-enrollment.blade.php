@extends('layouts.app')

@section('content')
    <div class="bg-white shadow">
        <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
        <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
            <div class="flex-1 min-w-0">
            <!-- Profile -->
            <div class="flex items-center">
                <img class="hidden h-16 w-16 rounded-full sm:block" src="{{ asset('/img/logo.jpg') }}" alt="">
                <div>
                <div class="flex items-center">
                    <img class="h-16 w-16 rounded-full sm:hidden" src="{{ asset('/img/logo.jpg') }}" alt="">
                    <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">PBCCMI</h1>
                </div>
                <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                    <dd class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                        Online Enrollment Form
                    </dd>
                </dl>
                </div>
            </div>
            </div>
            <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
            <a href="/login" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 mr-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Back to Login Page</a>
            </div>
        </div>
        </div>
    </div>
    <student-form :levels="{{ json_encode($levels) }}" :branches="{{ json_encode($branches) }}"></student-form>
@endsection
