@extends('bristolsu::base')

@section('title', 'Control')

@section('content')
    <div id="control-management"></div>
@endsection


@push('scripts')
    <script src="{{mix('js/control.js')}}"></script>
@endpush
