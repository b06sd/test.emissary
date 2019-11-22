@extends('layouts.dashboard')
@section('title', 'Individual Delivery')

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
                        <span><a href="{{ route('deliveries.index') }}">Delivery List</a></span>
                    </li>
                    <li class="active">
                        <span>Individual Delivery</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Individual Delivery
            </h2>
            <small>Manage Delivery for respective unit.</small>
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
                    Individual Delivery Information
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 border-right">
                            <p>
                                <form action="" method="POST" id="editScheduleForm">

                                    <div class="row form-group">
                                        <label for="item" class="col-sm-2 control-label">Item </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="item" id="item" class="form-control"
                                                placeholder="{{ $schedule[0]->item }}" value="{{ $schedule[0]->item }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="letter_title" class="col-sm-2 control-label">Title </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="letter_title" id="letter_title"
                                                class="form-control" placeholder="{{ $schedule[0]->letter_title }}"
                                                value="{{ $schedule[0]->letter_title }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="organisation" class="col-sm-2 control-label">Organisation </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="organisation" id="organisation"
                                                class="form-control" placeholder="{{ $schedule[0]->organisation }}"
                                                value="{{ $schedule[0]->organisation }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="location" class="col-sm-2 control-label">Location </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="location" id="location" class="form-control"
                                                placeholder="{{ $schedule[0]->location }}"
                                                value="{{ $schedule[0]->location }}" readonly>
                                        </div>
                                    </div>
                            </p>
                        </div>
                        <div class="col-lg-6 ">
                            <p>

                                <div class="row form-group">
                                    <label for="unit_id" class="col-sm-2 control-label">Unit </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="item" id="unit_id" class="form-control"
                                            placeholder="{{ $schedule[0]->unit_id }}"
                                            value="{{ $schedule[0]->unit_id }}" readonly>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label for="user_id" class="col-sm-2 control-label">Delivery Generated By </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="user_id" id="user_id" class="form-control"
                                            placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label for="created_at" class="col-sm-2 control-label">Date Created </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="created_at" id="created_at" class="form-control"
                                            placeholder="{{ $schedule[0]->created_at }}"
                                            value="<?php echo date('Y-m-d H:i:s');?>" readonly>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label for="created_at" class="col-sm-2 control-label">Courier Company </label>
                                    <div class="col-sm-10">
                                        <select name="courier" id="courier"
                                            class="form-control col-md-6 col-sm-6 col-xs-12">
                                            <option value="">Select Courier Company</option>
                                            <option value="Beta Courier Service">Beta Courier Service</option>
                                            <option value="Green White Logistics">Green White Logistics</option>
                                            <option value="Laudable Express">Laudable Express</option>
                                            <option value="Nester Errand Runner">Nester Errand Runner</option>
                                            <option value="OSIL Mail">OSIL Mail</option>
                                            <option value="Pearl Skyline">Pearl Skyline</option>
                                            <option value="Supreme Courier Service">Supreme Courier Service</option>
                                            <option value="Arrowhead Courier Service">Arrowhead Courier Service</option>
                                            <option value="Logit Logistics">Logit Logistics</option>
                                            <option value="Noaks Global Concept Logistic">Noaks Global Concept Logistic
                                            </option>
                                            <option value="Express Partners">Express Partners</option>
                                            <option value="Alpine Delivery">Alpine Delivery</option>
                                        </select>
                                    </div>
                                </div>
                            </p>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>
                            Send</button>
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