@extends('layouts.app')

@section('app-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p-button id="my-id" title="My Button" help="Help" tooltip="tooltip"></p-button>
                <module-index></module-index>
            </div>
        </div>
    </div>

@endsection
