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
                        query-string="{{url()->getAuthQueryString()}}"
                        :can-download-csv="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.admin.download-csv')?'true':'false')}}"
                        :can-update-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.admin.row.update')?'true':'false')}}"
                        :can-store-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.admin.row.store')?'true':'false')}}"
                        :can-delete-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.admin.row.delete')?'true':'false')}}">

                    </admin>
                </div>
            </div>
        </div>
    </div>
@endsection