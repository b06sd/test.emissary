@extends('layouts.dashboard')
@section('title', 'Company List')

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
                        <span>Manage Company</span>
                    </li>
                    <li class="active">
                        <span>Company List</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Manage Company
            </h2>
            <small>Manage Company.</small>
        </div>
    </div>
</div>


<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="container row">
                    <a href="javascript:void(0)" class="btn btn-success ml-3" id="create-new-company">Add New Company
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div id="company-crud-modal" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" id="companyCrudModal">Create company</h4>
                                <small class="font-bold">Create new company.</small>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route' => 'companies.store', 'method'=>'POST', 'id'=>'companyForm',
                                'name'=>'companyForm']) !!}
                                @csrf
                                <input type="hidden" name="company_id" id="company_id">
                                <div class="row form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="address" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="Address" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="description" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="3" id="description" name="description"
                                            placeholder="Write a brief description here ..."
                                            autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="description" class="col-sm-2 control-label">User ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="user_id" id="user_id" class="form-control"
                                            value="{{ Auth::user()->id }}" placeholder="{{ Auth::user()->id }}"
                                            autocomplete="off">
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

                    <span style="font-size:1.0em; font-weight:bold;">company List</span>
                </div>
                <div class="panel-body" style="display: block;">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <table id="company_list"
                                class="table table-striped table-bordered table-hover dataTable no-footer" width="100%"
                                role="grid" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th><b>S. No</b></th>
                                        <th><b>Name</b></th>
                                        <th><b>Address</b></th>
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
            document.getElementById("companyForm").submit();
        } 

        var SITEURL = '{{URL::to('')}}';
                $(document).ready( function () {
                    $('#company_list').DataTable({
                        processing: true,
                        serverSide: true,
                        scrollX: true,
                        ajax: '{!! route('companies.index') !!}',
                        columns: [
                            {data: 'id', name:'id', 'visible': false},
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                            {data: 'name', name: 'name' },
                            {data: 'address', name: 'address' },
                            {data: 'created_at', name: 'created_at' },
                            {data: 'action', name: 'action', orderable: false},
                        ],
                        order: [[0, 'desc']]
                    });

            
                    /* When user click's add new company button */
                    $('#create-new-company').click(function(){
                        $('#btn-save').val("create-company");
                        $('#company_id').val('');
                        $('#companyForm').trigger("reset");
                        $('#companyCrudModal').html("Add New company");
                        $('#company-crud-modal').modal('show');
                    });        
                });    
</script>
@endsection