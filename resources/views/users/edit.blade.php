@extends('layouts.dashboard')
@section('title', 'Edit User')


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
                        <span><a href="{{ route('users.index') }}">Users List</a></span>
                    </li>
                    <li class="active">
                        <span>Edit User</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Edit User
            </h2>
            <small>Manage User for respective unit.</small>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    Individual User Information
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 border-right">
                            <p>
                                <form action="{{ route('users.update',$user->id) }}" method="POST" id="editUserForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                    class="text-danger">*</b> User Type</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="user_type" id="user_type" class="form-control"
                                                    value="{{ $user->user_type }}">
                                                    <option value="">Select an option</option>
                                                    <option value="SysAdmin">SysAdmin</option>
                                                    <option value="Courier">Courier</option>
                                                    <option value="Agency">Agency</option>
                                                    <option value="Company">Company</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                    class="text-danger">*</b> Full Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" placeholder="Fullname" required
                                                    value="{{ $user->name }}" class="form-control" name="name" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                    class="text-danger">*</b> Email</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" placeholder="Email" required
                                                    value="{{ $user->email }}" class="form-control" name="email" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                            </p>
                        </div>
                        <div class="col-lg-6 ">
                            <p>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                class="text-danger">*</b> Unit</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="unit_id" id="unit_id" class="form-control">
                                                <option value="">Select Unit</option>
                                                @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                class="text-danger">*</b> Role</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="role_id" id="role_id" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="2">Administrator</option>
                                                <option value="3">Units</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    Edit User.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('dt-js')
<script>
    function form_submit() {
            document.getElementById("editUserForm").submit();
        } 
</script>
@endsection