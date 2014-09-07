<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>
        @section('title')
        Administration
        @show
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}}" rel="stylesheet" type="text/css"/>
    <link href="{{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}}" rel="stylesheet" type="text/css"/>
    <link href="{{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}}" rel="stylesheet" type="text/css"/>
    <link href="{{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="{{{ asset('assets/global/plugins/gritter/css/jquery.gritter.css') }}}" rel="stylesheet" type="text/css"/>
    <link href="{{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{{ asset('assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="{{{ asset('assets/admin/pages/css/tasks.css') }}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{{ asset('assets/global/css/components.css') }}}" rel="stylesheet" type="text/css"/>
    <link href="{{{ asset('assets/global/css/plugins.css') }}}" rel="stylesheet" type="text/css"/>
    <link href="{{{ asset('assets/admin/layout/css/layout.css') }}}" rel="stylesheet" type="text/css"/>
    <link href="{{{ asset('assets/admin/layout/css/themes/default.css') }}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{{ asset('assets/admin/layout/css/custom.css') }}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ url(Config::get('kitchen::adminRoute')) }}">
                <img src="{{{ asset('assets/admin/layout/img/logo.png') }}}" alt="logo" class="logo-default"/>
            </a>

            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{{ Gravatar::src(Confide::user()->email, 29) }}}"/>
                        <span class="username">{{{ Confide::user()->email }}}</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="extra_profile.html">
                                <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="extra_lock.html">
                                <i class="icon-lock"></i> Lock Screen </a>
                        </li>
                        <li>
                            <a href="{{{ url('users/logout') }}}">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper" style="margin-bottom: 10px">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>

                {{ HTML::metronicMenu(Config::get('kitchen::adminRoute'), 'Dashboard') }}
                {{ HTML::metronicMenu(null, 'User Management', 'icon-lock', array(array('route' => Config::get('kitchen::adminRoute').'/users', 'text' => 'Users'), array('route' => Config::get('kitchen::adminRoute').'/roles', 'text' => 'Roles'))) }}

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">


            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        @section('page_title')
                        Page Title
                        @show
                        <small>
                            @section('page_subtitle')
                            Subtitle
                            @show
                        </small>
                    </h3>
                    <ul class="page-breadcrumb breadcrumb">
                        @section('breadcrumbs')
                        @show
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->

            @yield('content')

            <!-- END CONTENT -->

        </div>
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        {{{ date('Y') }}} &copy; Kitchen by <a href="https://github.com/chrisbjr" target="_blank">@chrisbjr</a>
    </div>
    <div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{{ asset('assets/global/plugins/respond.min.js') }}}"></script>
<script src="{{{ asset('assets/global/plugins/excanvas.min.js') }}}"></script>
<![endif]-->
<script src="{{{ asset('assets/global/plugins/jquery-1.11.0.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/jquery-migrate-1.2.1.min.js') }}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{{ asset('assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/jquery.blockui.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/jquery.cokie.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{{ asset('assets/global/plugins/flot/jquery.flot.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/jquery.pulsate.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}}"
        type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="{{{ asset('assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/gritter/js/jquery.gritter.js') }}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{{ asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/global/scripts/metronic.js') }}}" type="text/javascript"></script>
<script src="{{{ asset('assets/admin/layout/scripts/layout.js') }}}" type="text/javascript"></script>
@section('javascript')
@show
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        TableManaged.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>