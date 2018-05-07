@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">{{ Config::get('settings.admin_panel_head') }}</div>
                <div class="panel-body">
                    <router-view name="companies_index"></router-view>
                    <router-view></router-view>
                </div>
        </div>
    </div>
@endsection
