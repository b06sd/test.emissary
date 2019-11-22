@extends('layouts.dashboard')
@section('title', 'Individual Company')

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
                        <span><a href="{{ route('companies.index') }}">Company List</a></span>
                    </li>
                    <li class="active">
                        <span>Individual Company</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Individual Company
            </h2>
            <small>Manage Company.</small>
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
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {{ $company[0]->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Address:</strong>
                                        {{ $company[0]->address }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        {{ $company[0]->description }}
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