@extends('data-entry::layouts.app')

@section('title', 'Your Module')

@section('module-content')
    <p-page-content title="{{settings('title')}}" subtitle="{{settings('subtitle')}}">
        <participant
            :column-schema="{{(settings('column_types', null) !== null ? json_encode(settings('column_types')) : '{}')}}"
            :use-csv="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.use-csv')?'true':'false')}}"
            :download-csv="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.download-csv')?'true':'false')}}"
            :can-update-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.row.update')?'true':'false')}}"
            :can-store-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.row.store')?'true':'false')}}"
            :can-delete-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.row.delete')?'true':'false')}}">
        </participant>
    </p-page-content>
@endsection
