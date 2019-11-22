@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="content">
    @role(['superadministrator', 'administrator'])
    <div class="row">
        <div class="col-lg-12 text-center welcome-message">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hpanel">
                        <div class="panel-body text-center h-200">
                            <i class="pe-7s-graph1 fa-4x"></i>

                            <h1 class="m-xs">1,206,900</h1>

                            <h3 class="font-extra-bold no-margins text-success">
                                All Deliveries
                            </h3>
                            <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum.</small>
                        </div>
                        <div class="panel-footer">
                            This is standard panel footer
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hpanel stats">
                        <div class="panel-body h-200">
                            <div class="stats-title pull-left">
                                <h4>Today's Delivery</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="pe-7s-share fa-4x"></i>
                            </div>
                            <div class="m-t-xl">
                                <h3 class="m-b-xs">210</h3>
                                <span class="font-bold no-margins">
                                    Count
                                </span>

                                <div class="progress m-t-xs full progress-small">
                                    <div style="width: 55%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="55"
                                        role="progressbar" class=" progress-bar progress-bar-success">
                                        <span class="sr-only">35% Complete (success)</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stats-label">Pages / Visit</small>
                                        <h4>7.80</h4>
                                    </div>

                                    <div class="col-xs-6">
                                        <small class="stats-label">% New Visits</small>
                                        <h4>76.43%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            This is standard panel footer
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hpanel stats">
                        <div class="panel-body text-center h-200">
                            <i class="pe-7s-graph1 fa-4x"></i>

                            <h1 class="m-xs">&#x20A6;1,206,900</h1>

                            <h3 class="font-extra-bold no-margins text-success">
                                All Payment
                            </h3>
                            <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum.</small>
                        </div>
                        <div class="panel-footer">
                            This is standard panel footer
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hpanel stats">
                        <div class="panel-body h-200">
                            <div class="stats-title pull-left">
                                <h4>Today's payment</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="pe-7s-cash fa-4x"></i>
                            </div>
                            <div class="clearfix"></div>
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-income-chart"
                                    style="padding: 0px; position: relative;"><canvas class="flot-base" width="208"
                                        height="60"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 208px; height: 60px;"></canvas><canvas
                                        class="flot-overlay" width="208" height="60"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 208px; height: 60px;"></canvas>
                                </div>
                            </div>
                            <div class="m-t-xs">

                                <div class="row">
                                    <div class="col-xs-5">
                                        <small class="stat-label">Today</small>
                                        <h4>&#x20A6; 230,000 </h4>
                                    </div>
                                    <div class="col-xs-7">
                                        <small class="stat-label">Last week</small>
                                        <h4>&#x20A6; 7,980,600 <i class="fa fa-level-up text-success"></i></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            This is standard panel footer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole

    @role('units')
    <div class="row">
        <div class="col-lg-12 text-center welcome-message">
            <h2>
                Welcome to Logit
            </h2>

            <p>
                Special <strong>Admin Theme</strong> for medium and large web applications with very clean and
                aesthetic style and feel.
            </p>
        </div>
    </div>
    @endrole

    @role('courier')
    <div class="row">
        <div class="col-lg-12 text-center welcome-message">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hpanel">
                        <div class="panel-body text-center h-200">
                            <i class="pe-7s-graph1 fa-4x"></i>

                            <h1 class="m-xs">1,206,900</h1>

                            <h3 class="font-extra-bold no-margins text-success">
                                All Deliveries
                            </h3>
                            <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum.</small>
                        </div>
                        <div class="panel-footer">
                            This is standard panel footer
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hpanel stats">
                        <div class="panel-body h-200">
                            <div class="stats-title pull-left">
                                <h4>Today's Delivery</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="pe-7s-share fa-4x"></i>
                            </div>
                            <div class="m-t-xl">
                                <h3 class="m-b-xs">210</h3>
                                <span class="font-bold no-margins">
                                    Count
                                </span>

                                <div class="progress m-t-xs full progress-small">
                                    <div style="width: 55%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="55"
                                        role="progressbar" class=" progress-bar progress-bar-success">
                                        <span class="sr-only">35% Complete (success)</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <small class="stats-label">Pages / Visit</small>
                                        <h4>7.80</h4>
                                    </div>

                                    <div class="col-xs-6">
                                        <small class="stats-label">% New Visits</small>
                                        <h4>76.43%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            This is standard panel footer
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hpanel stats">
                        <div class="panel-body text-center h-200">
                            <i class="pe-7s-graph1 fa-4x"></i>

                            <h1 class="m-xs">&#x20A6;1,206,900</h1>

                            <h3 class="font-extra-bold no-margins text-success">
                                All Payment
                            </h3>
                            <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit vestibulum.</small>
                        </div>
                        <div class="panel-footer">
                            This is standard panel footer
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hpanel stats">
                        <div class="panel-body h-200">
                            <div class="stats-title pull-left">
                                <h4>Today's payment</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="pe-7s-cash fa-4x"></i>
                            </div>
                            <div class="clearfix"></div>
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-income-chart"
                                    style="padding: 0px; position: relative;"><canvas class="flot-base" width="208"
                                        height="60"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 208px; height: 60px;"></canvas><canvas
                                        class="flot-overlay" width="208" height="60"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 208px; height: 60px;"></canvas>
                                </div>
                            </div>
                            <div class="m-t-xs">

                                <div class="row">
                                    <div class="col-xs-5">
                                        <small class="stat-label">Today</small>
                                        <h4>&#x20A6; 230,000 </h4>
                                    </div>
                                    <div class="col-xs-7">
                                        <small class="stat-label">Last week</small>
                                        <h4>&#x20A6; 7,980,600 <i class="fa fa-level-up text-success"></i></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            This is standard panel footer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</div>
@endsection