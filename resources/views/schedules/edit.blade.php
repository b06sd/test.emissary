@extends('layouts.dashboard')
@section('title', 'Edit Schedule')


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
                        <span><a href="{{ route('schedules.index') }}">Schedule List</a></span>
                    </li>
                    <li class="active">
                        <span>Edit Schedule</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Edit Schedule
            </h2>
            <small>Manage Schedule for respective unit.</small>
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
                    Individual Schedule Information
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 border-right">
                            <p>
                                <form action="{{ route('schedules.update',$schedule->id) }}" method="POST"
                                    id="editScheduleForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                    class="text-danger">*</b> Item</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" placeholder="Enter item name" required
                                                    value="{{ $schedule->item }}" class="form-control" name="item" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                    class="text-danger">*</b> Letter Title</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="letter_title" id="letter_title" class="form-control">
                                                    <option value="">Select Letter Title</option>
                                                    <option value="PAYE Computation">PAYE Computation</option>
                                                    <option value="Invitation">Invitation</option>
                                                    <option value="Demand Notice">Demand Notice</option>
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
                                                    class="text-danger">*</b> Organisation</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" placeholder="Organisation" required
                                                    value="{{ $schedule->organisation }}" class="form-control"
                                                    name="organisation" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                    class="text-danger">*</b> Location</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" placeholder="Location" required
                                                    value="{{ $schedule->location }}" class="form-control"
                                                    name="location" />
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
                                                class="text-danger">*</b> Unit</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" placeholder="Unit" required
                                                value="{{ Auth::user()->unit_id }}" readonly class="form-control"
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
                                                class="text-danger">*</b> User</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" placeholder="User" required
                                                value="{{ Auth::user()->id }}" readonly class="form-control"
                                                name="user_id" />
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
                    Edit Schedule.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('dt-js')
<script>
    function form_submit() {
            document.getElementById("editScheduleForm").submit();
        } 
</script>
@endsection