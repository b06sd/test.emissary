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
                        <span>Manage App User</span>
                    </li>
                    <li class="active">
                        <span>App User List</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Manage App User
            </h2>
            <small>Manage App Users for respective unit.</small>
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
                                        {{-- <th><b>S.No</b></th> --}}
                                        <th><b>Email</b></th>
                                        <th><b>Status</b></th>
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
    $(document).ready( function () {
                    $('#user_list').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('users.allAppUser') !!}',
                        columns: [
                            {data: 'id', name:'id', 'visible': true},
                            
                            {data: 'email', name: 'email' },
                            {data: 'status', name: 'status' },
                            {data: 'action', name: 'action', orderable: false},
                        ],
                        order: [[0, 'desc']]
                    });
    });
</script>

@endsection