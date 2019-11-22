@extends('layouts.dashboard')
@section('title', 'Users List')

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
                        <span>Manage Users</span>
                    </li>
                    <li class="active">
                        <span>Users List</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Manage Users
            </h2>
            <small>Manage Users for respective unit.</small>
        </div>
    </div>
</div>


<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">

                <div class="container row">
                    <a href="javascript:void(0)" class="btn btn-success ml-3" id="create-new-user">Add New User
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div id="user-crud-modal" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" id="userCrudModal">Create User</h4>
                                <small class="font-bold">Create new user.</small>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route' => 'users.store', 'method'=>'POST', 'id'=>'userForm',
                                'name'=>'userForm']) !!}
                                @csrf
                                <input type="hidden" name="user_id" id="user_id">
                                <div class="row form-group">
                                    <label for="user_type" class="col-sm-2 control-label">User Type</label>
                                    <div class="col-sm-10">
                                        <select name="user_type" id="user_type" class="form-control">
                                            <option value="">Select User Type</option>
                                            <option value="SysAdmin">System Administrator</option>
                                            <option value="Agency">Agency</option>
                                            <option value="Courier">Courier Company</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="name" class="col-sm-2 control-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name"
                                            placeholder="Full Name">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="password" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="password-confirm"
                                        class="col-sm-2 control-label">{{ __('Confirm Password') }}</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="password-confirm" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="unit_id" class="col-sm-2 control-label">Unit</label>
                                    <div class="col-sm-10">
                                        <select name="unit_id" id="unit_id" class="form-control">
                                            <option value="">Select Unit</option>
                                            @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="role_id" class="col-sm-2 control-label">Role</label>
                                    <div class="col-sm-10">
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="">Select Role</option>
                                            <option value="1">Superadministrator</option>
                                            <option value="2">Administrator</option>
                                            <option value="3">Units</option>
                                            <option value="4">Courier</option>
                                        </select>
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

                    <span style="font-size:1.0em; font-weight:bold;">Users List</span>
                </div>
                <div class="panel-body" style="display: block;">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <table id="user_list"
                                class="table table-striped table-bordered table-hover dataTable no-footer" width="100%"
                                role="grid" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th><b>S. No</b></th>
                                        <th><b>User Type</b></th>
                                        <th><b>FullName</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Unit</b></th>
                                        <th><b>Role</b></th>
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
            document.getElementById("userForm").submit();
        } 

        var SITEURL = '{{URL::to('')}}';
                $(document).ready( function () {
                    $('#user_list').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('users.index') !!}',
                        columns: [
                            {data: 'id', name:'id', 'visible': false},
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                            {data: 'user_type', name: 'user_type' },
                            {data: 'name', name: 'name' },
                            {data: 'email', name: 'email' },
                            {data: 'unit_name', name: 'unit_name' },
                            {data: 'role_name', name: 'role_name' },
                            {data: 'created_at', name: 'created_at' },
                            {data: 'action', name: 'action', orderable: false},
                        ],
                        order: [[0, 'desc']]
                    });

            
                    /* When user click's add new user button */
                    $('#create-new-user').click(function(){
                        $('#btn-save').val("create-user");
                        $('#user_id').val('');
                        $('#userForm').trigger("reset");
                        $('#userCrudModal').html("Add New User");
                        $('#user-crud-modal').modal('show');
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