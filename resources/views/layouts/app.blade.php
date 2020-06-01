@extends('bristolsu::base')

@section('title', 'Playground')

@section('content')
    <div id="playground">
        @yield('app-content')
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    
@endpush
