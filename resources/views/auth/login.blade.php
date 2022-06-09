@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-blue-200">
            <div class="relative sm:max-w-sm w-full">
                <div class="card bg-blue-700 shadow-lg   w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                <div class="card bg-blue-300 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md w-96 h-96">
                    <label for="" class="block mt-3 text-3xl font-bold text-gray-700 text-center font-semibold">
                        SFAMS
                    </label>
                    <form method="POST" class="mt-10" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <input id="email" placeholder="E-Mail" type="email" class="px-2 mt-1 block w-full bg-gray-100 h-10 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback text-xs text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                        <div class="mt-7">
                            <input id="password" placeholder="Password" type="password" class="px-2 mt-1 block w-full bg-gray-100 h-10 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback text-xs text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                       
                        </div>

                        <div class="mt-7">
                        <div class="relative inline-block text-gray-700 w-full">
                        <select class="px-2 mt-1 block w-full bg-gray-100 h-10 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none focus:border-blue-500" placeholder="Regular input">
                        <option selected>All Section</option> 
                        <option>Student</option>
                        <option>Admin</option>
                        </select>   
                        </div>
                        </div>
            
                        <div class="mt-7">
                            <button type="submit" class="bg-blue-700 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
