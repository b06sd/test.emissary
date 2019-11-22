@extends('layouts.dashboard')
@section('title', 'Edit Company Information')

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
                        <span>Edit Individual Company</span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Manage Company
            </h2>
            <small>Edit Individual Company.</small>
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
                                <form action="{{ route('companies.update', $company->id) }}" method="POST"
                                    id="editCompanyForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                    class="text-danger">*</b> Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" placeholder="Enter company name" required
                                                    value="{{ $company->name }}" class="form-control" name="name" />
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
                                                    value="{{ $company->address }}" class="form-control"
                                                    name="address" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right"><b
                                                    class="text-danger">*</b> Description</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" placeholder="Description" required
                                                    value="{{ $company->description }}" class="form-control"
                                                    name="description" />
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
                                                class="text-danger">*</b> User ID</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" placeholder="{{ $company->user_id }}" required
                                                value="{{ $company->user_id }}" readonly class="form-control"
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
                    Edit Companies.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection