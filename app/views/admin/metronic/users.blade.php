@extends('admin.metronic.layouts.admin')

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
    <a href="{{{ url(Config::get('kitchen.admin.route')) }}}">Dashboard</a>
    <i class="fa fa-angle-right"></i>
</li>
<li>
    <a href="javascript:;">Users</a>
</li>
@stop


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>List of users
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#responsive">
                            Add New <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Joined</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr onclick="javascript:window.location = '{{ $user->getAdminProfileUrl() }}';" style="cursor: pointer">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->confirmed)
                            <span class="label label-sm label-success">Active</span>
                            @else
                            <span class="label label-sm label-warning">Pending</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() }}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">
                    Add a new user
                </h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Some Input</h4>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4>Some More Input</h4>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>

                            <p>
                                <input type="text" class="col-md-12 form-control">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default">Close</button>
                <button type="button" class="btn green">Save changes</button>
            </div>
        </div>
    </div>
</div>


@stop

@section('javascript')
<script type="text/javascript">
    jQuery(document).ready(function () {

        var table = $('#sample_1');

        // begin first table
        table.dataTable({
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "pagingType": "bootstrap_full_number",
            "language": {
                "lengthMenu": "_MENU_ records",
                "paginate": {
                    "previous": "Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },
            "order": [
                [0, "desc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#sample_1_wrapper');

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                    $(this).parents('tr').addClass("active");
                } else {
                    $(this).attr("checked", false);
                    $(this).parents('tr').removeClass("active");
                }
            });
            jQuery.uniform.update(set);
        });

        table.on('change', 'tbody tr .checkboxes', function () {
            $(this).parents('tr').toggleClass("active");
        });

        tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
    });
</script>
@stop