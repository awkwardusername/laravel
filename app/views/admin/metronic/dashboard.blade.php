@extends('admin.metronic.layouts.admin')

{{-- Page Title --}}
@section('page_title')
Dashboard
@stop

{{-- Page subtitle --}}
@section('page_subtitle')
statistics and more
@stop

@section('breadcrumbs')
<li>
    <i class="fa fa-home"></i>
    <a href="{{{ url(Config::get('kitchen.admin.route')) }}}">Dashboard</a>
</li>
@stop