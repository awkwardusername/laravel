@extends('admin.metronic.layouts.admin')

{{-- Page Title --}}
@section('page_title')
Roles
@stop

{{-- Page subtitle --}}
@section('page_subtitle')
user management
@stop

@section('breadcrumbs')
<li>
    <i class="fa fa-home"></i>
    <a href="{{{ url(Config::get('kitchen.admin.route')) }}}">Dashboard</a>
    <i class="fa fa-angle-right"></i>
</li>
<li>
    <a href="javascript:;">Roles</a>
</li>
@stop