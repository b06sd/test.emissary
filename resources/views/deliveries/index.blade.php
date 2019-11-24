@extends('layouts.dashboard')
@section('title', 'Delivery List')

@section('dt-css')
<link rel="stylesheet" href="{{ secure_asset('assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="normalheader ">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>

            <div id="hbreadcrumb" class="pull-right m-t-lg">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="/home">Dashboard</a></li>
                    <li>
                        <span>Manage Delivery</span>
                    </li>
                    <li class="active">
                        <span>Delivery List</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Manage Delivery
            </h2>
            <small>Manage Delivery.</small>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">

                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>

                    <span style="font-size:1.0em; font-weight:bold;">Delivery List</span>
                </div>
                <div class="panel-body" style="display: block;">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <table id="schedule_list"
                                class="table table-striped table-bordered table-hover dataTable no-footer" width="100%"
                                role="grid" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th><b>S. No</b></th>
                                        <th><b>Organisation</b></th>
                                        <th><b>Item</b></th>
                                        <th><b>Title of Letter</b></th>
                                        <th><b>Unit of Creation</b></th>
                                        <th><b>Created At</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('dt-js')
<script src="{{ secure_asset('assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script>
    function form_submit() {
            document.getElementById("scheduleForm").submit();
        } 

        var SITEURL = '{{URL::to('')}}';
                $(document).ready( function () {
                    $('#schedule_list').DataTable({
                        processing: true,
                        serverSide: true,
                        scrollX: true,
                        ajax: '{!! route('deliveries.index') !!}',
                        columns: [
                            {data: 'id', name:'id', 'visible': false},
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                            {data: 'organisation', name: 'organisation' },
                            {data: 'item', name: 'item' },
                            {data: 'letter_title', name: 'letter_title' },
                            {data: 'name', name: 'name' },
                            {data: 'created_at', name: 'created_at' },
                            {data: 'action', name: 'action', orderable: false},
                        ],
                        order: [[0, 'desc']]
                    });

            
                    /* When user click's add new schedule button */
                    $('#create-new-schedule').click(function(){
                        $('#btn-save').val("create-schedule");
                        $('#schedule_id').val('');
                        $('#scheduleForm').trigger("reset");
                        $('#scheduleCrudModal').html("Add New Schedule");
                        $('#schedule-crud-modal').modal('show');
                    });              

                    /* When click edit schedule */
                    $('body').on('click', '#edit-schedule', function(){
                        var schedule_id = $(this).data('id');
                        $.get('schedule-crud-list/' + schedule_id + '/edit', function(data){
                            $('#organisation-error').hide();
                            $('#location-error').hide();
                            $('#item-error').hide();
                            $('#letter_title-error').hide();
                            $('#unit_id-error').hide();
                            $('#user_id-error').hide();
                            $('#scheduleCrudModal').html('Edit Schedule');
                            $('#btn-save').val('edit-schedule');
                            $('#schedule-crud-modal').modal('show');
                            $('#schedule_id').val(data.id);
                            $('#organisation').val(data.organisation);
                            $('#location').val(data.location);
                            $('#item').val(data.item);
                            $('#letter_title').val(data.letter_title);                          
                        })
                    });
                });
</script>
@endsection