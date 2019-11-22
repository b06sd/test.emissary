@extends('layouts.dashboard')
@section('title', 'Create Company Schedule')

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
                        <span>Create Company Schedule</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Manage Company
            </h2>
            <small>Create Company Schedule.</small>
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
                    Individual Company Information
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 border-right">
                            <p>
                                {!! Form::open(['route' => 'companies.storeSchedule', 'method'=>'POST',
                                'id'=>'scheduleForm',
                                'name'=>'scheduleForm']) !!}
                                @csrf
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                class="text-danger">*</b> Organisation</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" placeholder="Enter organisation name" required
                                                value="{{ $company->name }}" class="form-control" name="organisation" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                class="text-danger">*</b> Address</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" placeholder="Enter address" required
                                                value="{{ $company->address }}" class="form-control" name="address" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                class="text-danger">*</b> Scheduled Item</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" placeholder="Scheduled Item" required value=""
                                                class="form-control" name="item" />
                                        </div>
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="col-lg-6 ">
                            <p>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                class="text-danger">*</b> Title</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="letter_title" id="letter_title" class="form-control">
                                                <option value="">Select Title</option>
                                                <option value="Default">Default</option>
                                                <option value="Demand Notice">Demand Notice</option>
                                                <option value="Invitation">Invitation</option>
                                                <option value="PAYE Computation">PAYE Computation</option>
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
                                                class="text-danger">*</b> Unit ID</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" placeholder="Scheduled Item" required readonly
                                                value="{{ Auth::user()->unit_id }}" class="form-control"
                                                name="unit_id" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                class="text-danger">*</b> User ID</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" placeholder="Username" required readonly
                                                value="{{ Auth::user()->name }}" class="form-control" name="name" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="padding-left: 410px;">
                                        <button type="button" class="btn btn-success"
                                            onclick="form_submit()">Submit</button>
                                    </div>
                                </div>
                            </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    Create Company Schedule.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('dt-js')
<script>
    function form_submit() {
            document.getElementById("scheduleForm").submit();
        } 
</script>
@endsection