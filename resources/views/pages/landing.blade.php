@extends('layouts.app')

@section('app-content')
    <p-featured-card
        title="Welcome to the Portal"
        subtext="Optional Subtext"
        bg="landing-page"
    >
        <!-- TODO Tailwind classes need moving into the UI kit as variants -->
        <p-button class="w-full px-16 py-2 my-2 text-base font-medium text-blueGray-600 transition duration-500 ease-in-out transform rounded-md border-blueGray-50 bg-blueGray-50 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blueGray-100" href="{{route('login')}}">
            Login
        </p-button>
        <p-button variant="secondary" class="w-full px-16 py-2 my-2 text-base font-medium text-white transition duration-500 ease-in-out transform border-black rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blueGray-900" href="{{route('register')}}">
            Register
        </p-button>
    </p-featured-card>
@endsection
