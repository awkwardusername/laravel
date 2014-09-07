@extends('admin.layouts.admin')

{{-- Page Title --}}
@section('page_title')
Users
@stop

{{-- Page subtitle --}}
@section('page_subtitle')
user management
@stop

@section('breadcrumbs')
<li>
    <i class="fa fa-home"></i>
    <a href="{{{ url(Config::get('kitchen::adminRoute')) }}}">Dashboard</a>
    <i class="fa fa-angle-right"></i>
</li>
<li>
    <a href="javascript:;">Users</a>
</li>
@stop


@section('content')

@stop