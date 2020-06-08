@extends('data-entry::layouts.app')

@section('title', 'Your Module')

@section('module-content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h2 class="">{{settings('title', '')}}</h2>
                    <p class="">{{settings('subtitle', '')}}</p>
                    
                    <participant 
                        :column-schema="{{(settings('column_types', null) !== null ? json_encode(settings('column_types')) : '{}')}}"
                        query-string="{{url()->getAuthQueryString()}}"
                        :use-csv="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.use-csv')?'true':'false')}}"
                        :download-csv="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.download-csv')?'true':'false')}}"
                        :can-update-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.row.update')?'true':'false')}}"
                        :can-store-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.row.store')?'true':'false')}}"
                        :can-delete-row="{{(BristolSU\Support\Permissions\Facade\PermissionTester::evaluate('data-entry.row.delete')?'true':'false')}}">
                    </participant>
                </div>
            </div>
        </div>
    </div>
@endsection