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
    <i class="fa fa-angle-right"></i>
</li>
<li>
    <a href="{{ url(Config::get('kitchen.admin.route').'/users') }}">Users</a>
    <i class="fa fa-angle-right"></i>
</li>
<li>
    <a href="javascript:;">{{ $user->email }}</a>
</li>

@stop

@section('content')
<div class="row profile">
    <div class="col-md-12">
        <!--BEGIN TABS-->
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab">Account </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
                    <div class="row profile-account">
                        <div class="col-md-3">
                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                <li>
                                    <img src="{{Gravatar::src($user->email, 229)}}" class="img-responsive" alt="" style="width: 100%"/>
                                </li>
                                <li class="active">
                                    <a data-toggle="tab" href="#tab_1-1">
                                        <i class="fa fa-cog"></i> Personal info </a>
												<span class="after">
												</span>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab_3-3">
                                        <i class="fa fa-lock"></i> Change Password </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div id="tab_1-1" class="tab-pane active">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label class="control-label">Username</label>
                                            <input type="text" class="form-control" value="{{ $user->username }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" value="{{ $user->email }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">First Name</label>
                                            <input type="text" class="form-control" value="{{ isset($user->userProfile->first_name) ? $user->userProfile->first_name : '' }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" class="form-control" value="{{ isset($user->userProfile->last_name) ? $user->userProfile->last_name : '' }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Mobile Number</label>
                                            <input type="text" class="form-control" value="{{ isset($user->userProfile->mobile_number) ? $user->userProfile->mobile_number : '' }}"/>
                                        </div>
                                        <div class="margiv-top-10">
                                            <a href="#" class="btn green">
                                                Save Changes </a>
                                            <a href="#" class="btn default">
                                                Cancel </a>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab_3-3" class="tab-pane">
                                    <form action="#">
                                        <div class="form-group">
                                            <label class="control-label">Current Password</label>
                                            <input type="password" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input type="password" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Re-type New Password</label>
                                            <input type="password" class="form-control"/>
                                        </div>
                                        <div class="margin-top-10">
                                            <a href="#" class="btn green">
                                                Change Password </a>
                                            <a href="#" class="btn default">
                                                Cancel </a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!--end col-md-9-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop