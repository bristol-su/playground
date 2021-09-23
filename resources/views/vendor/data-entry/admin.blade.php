@extends('data-entry::layouts.app')

@section('title', 'Your Module')

@section('module-content')
    <p-page-content title="{{settings('title')}} - Admin" subtitle="{{settings('subtitle')}}">
        <admin
            :column-schema="{{(settings('column_types', null) !== null ? json_encode(settings('column_types')) : '{}')}}"
            query-string="{{url()->getAuthQueryString()}}"
            :can-download-csv="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.admin.download-csv')?'true':'false')}}"
            :can-update-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.admin.row.update')?'true':'false')}}"
            :can-store-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.admin.row.store')?'true':'false')}}"
            :can-delete-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.admin.row.delete')?'true':'false')}}">
        </admin>
    </p-page-content>
@endsection
