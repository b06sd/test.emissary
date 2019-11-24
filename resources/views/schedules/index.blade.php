@extends('layouts.dashboard')
@section('title', 'Schedule List')

@section('dt-css')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
                        <span>Manage Schedule</span>
                    </li>
                    <li class="active">
                        <span>Schedule List</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Manage Schedule
            </h2>
            <small>Manage Schedule for respective unit.</small>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <!-- Commented out the button for add new schedule 
                <div class="container row">
                    <a href="javascript:void(0)" class="btn btn-success ml-3" id="create-new-schedule">Add New Schedule
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            -->
                <div id="schedule-crud-modal" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" id="scheduleCrudModal">Create Schedule</h4>
                                <small class="font-bold">Create new schedule.</small>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route' => 'schedules.store', 'method'=>'POST', 'id'=>'scheduleForm',
                                'name'=>'scheduleForm']) !!}
                                @csrf
                                <input type="hidden" name="schedule_id" id="schedule_id">
                                <div class="row form-group">
                                    <label for="organisation" class="col-sm-2 control-label">Organisation</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="organisation" id="organisation" class="form-control"
                                            placeholder="organisation">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="location" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="location" id="location" class="form-control"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="item" class="col-sm-2 control-label">Item</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="item" id="item" class="form-control"
                                            placeholder="Item">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="letter_title" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <select name="letter_title" id="letter_title" class="form-control">
                                            <option value="">Select Title</option>
                                            <option value="Default">Default</option>
                                            <option value="Demand Notice">Demand Notice</option>
                                            <option value="Invitation">Invitation</option>
                                            <option value="PAYE Computation">PAYE Computation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="unit" class="col-sm-2 control-label">Unit</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="unit_id" id="unit_id" class="form-control"
                                            readonly="readonly" placeholder="{{ Auth::user()->unit_id }}"
                                            value="{{ Auth::user()->unit_id }}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="user" class="col-sm-2 control-label">User</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="user_id" id="user_id" class="form-control"
                                            readonly="readonly" placeholder="{{ Auth::user()->name }}"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" onclick="form_submit()">Submit</button>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>

                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>

                    <span style="font-size:1.0em; font-weight:bold;">Schedule List</span>
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
                                        <th><b>Unit</b></th>
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
<script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
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
                        ajax: '{!! route('schedules.index') !!}',
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