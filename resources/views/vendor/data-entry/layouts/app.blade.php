@extends('bristolsu::base')

@section('content')
    <div id="data-entry-root">
        @yield('module-content')
    </div>
@endsection

@push('styles')
    <link href="{{ asset('modules/data-entry/css/module.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('modules/data-entry/js/module.js') }}"></script>
@endpush
