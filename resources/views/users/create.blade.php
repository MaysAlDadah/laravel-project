@extends('layouts.app')

{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
{{--    </x-slot>--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--</x-app-layout>--}}































{{--@section('content')
    <h1>Create User</h1>
    <form action="{{ route('usersstore') }}" method="POST">
@csrf
<div>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    @error('name')
    <div>{{ $message }}</div>
    @enderror
</div>
<div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    @error('email')
    <div>{{ $message }}</div>
    @enderror
</div>
<div>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    @error('password')
    <div>{{ $message }}</div>
    @enderror
</div>
<button type="submit">Create User</button>
</form>
@endsection
--}}
