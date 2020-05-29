@extends('data-entry::layouts.app')

@section('title', 'Your Module')

@section('module-content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h2 class="">{{settings('title', '')}} - Admin</h2>
                    <p class="">{{settings('subtitle', '')}}</p>

                    <admin
                        :column-schema="{{(settings('column_types', null) !== null ? json_encode(settings('column_types')) : '{}')}}"
                        query-string="{{url()->getAuthQueryString()}}">

                    </admin>
                </div>
            </div>
        </div>
    </div>
@endsection