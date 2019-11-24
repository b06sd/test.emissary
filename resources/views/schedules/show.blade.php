@extends('layouts.dashboard')
@section('title', 'Individual Schedule')

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
                        <span>Individual Schedule</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Individual Schedule
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
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Item:</strong>
                                        {{ $schedule[0]->item }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        {{ $schedule[0]->letter_title }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Organisation:</strong>
                                        {{ $schedule[0]->organisation }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Location:</strong>
                                        {{ $schedule[0]->location }}
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="col-lg-6 ">
                            <p>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Unit:</strong>
                                        {{ $schedule[0]->unit_name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Created By:</strong>
                                        {{ $user[0]->user_name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date Created:</strong>
                                        {{ $schedule[0]->created_at }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Status:</strong>

                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    Individual Schedule Information
                </div>
            </div>
        </div>
    </div>
</div>
@endsection