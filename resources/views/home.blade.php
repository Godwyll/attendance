@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="app-content">
        @php
            $i = 1;
            $entries = \App\Models\Entry::all();
            $timetables = \App\Models\Timetable::all();
            $todaysEntries = \App\Models\Entry::whereDate('created_at', Carbon\Carbon::today())->get();
            $todaysSessions = \App\Models\Timetable::where('date', date('Y-m-d'))->get();
        @endphp

        <div class="row" id="cards">
            <div class="col-md-3 col-sm-6">
                <div class="widget stats-widget">
                    <div class="widget-body clearfix">
                        <div class="pull-left">
                            <h3 class="widget-title text-dark"><span>{{ count($entries) }}</span></h3>
                            <small class="text-color">Attendance Entries</small>
                        </div>
                        <span class="pull-right big-icon watermark"><i
                                class="zmdi zmdi-collection-video zmdi-hc-lg"></i></span>
                    </div>
                    <footer class="widget-footer bg-dark">
                        <small>All</small>
                    </footer>
                </div><!-- .widget -->
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="widget stats-widget">
                    <div class="widget-body clearfix">
                        <div class="pull-left">
                            <h3 class="widget-title text-warning"><span>{{ count($timetables) }}</span></h3>
                            <small class="text-color">Timetable Sessions</small>
                        </div>
                        <span class="pull-right big-icon watermark"><i class="zmdi zmdi-accounts-alt zmdi-hc-lg"></i></span>
                    </div>
                    <footer class="widget-footer bg-warning">
                        <small>All</small>
                    </footer>
                </div><!-- .widget -->
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="widget stats-widget">
                    <div class="widget-body clearfix">
                        <div class="pull-left">
                            <h3 class="widget-title text-dark"><span>{{ count($todaysEntries) }}</span></h3>
                            <small class="text-color">Today's Entries</small>
                        </div>
                        <span class="pull-right big-icon watermark"><i
                                class="zmdi zmdi-accounts-outline zmdi-hc-lg"></i></span>
                    </div>
                    <footer class="widget-footer bg-dark">
                        <small>{{ Helpers::coolDate(date('Y-m-d')) }}</small>
                    </footer>
                </div><!-- .widget -->
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="widget stats-widget">
                    <div class="widget-body clearfix">
                        <div class="pull-left">
                            <h3 class="widget-title text-warning"><span>{{ count($todaysSessions) }}</span></h3>
                            <small class="text-color">Today's Sessions</small>
                        </div>
                        <span class="pull-right big-icon watermark"><i class="zmdi zmdi-shield-check zmdi-hc-lg"></i></span>
                    </div>
                    <footer class="widget-footer bg-warning">
                        <small>{{ Helpers::coolDate(date('Y-m-d')) }}</small>
                    </footer>
                </div><!-- .widget -->
            </div>

        </div><!-- .row -->

        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="m-b-lg nav-tabs-horizontal">
                        <!-- tabs list -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#today" aria-controls="all" role="tab"
                                    data-toggle="tab">Today's Entries</a></li>
                            {{-- <li role="presentation"><a href="#all" aria-controls="tab-3" role="tab" data-toggle="tab">All Entries</a></li> --}}
                        </ul><!-- .nav-tabs -->

                        <!-- Tab panes -->
                        <div class="tab-content p-md">

                            <div role="tabpanel" class="tab-pane in active fade" id="today">
                                <!-- DOM dataTable -->
                                <div class="">
                                    <div class="widget">
                                        <header class="widget-header">
                                            <h4 class="widget-title">Today's Entries ({{ date('D, jS M Y') }})
                                                {{-- <span class="pull-right">
                                                    <form action="{{ route('/') }}" method="post">
                                                        @csrf
                                                        <strong>Change Date: </strong>&nbsp;
                                                        <input type="date" name="date">
                                                        <button type="submit" class="btn btn-xs btn-dark">Go</button>
                                                    </form>
                                                </span> --}}
                                            </h4>
                                        </header><!-- .widget-header -->
                                        <hr class="widget-separator">
                                        <div class="widget-body">
                                            @include('entries.list')
                                        </div><!-- .widget-body -->
                                    </div><!-- .widget -->
                                </div><!-- END column -->

                            </div><!-- .tab-pane  -->

                            <div role="tabpanel" class="tab-pane fade" id="all">
                                <div class="">
                                </div><!-- END column -->

                            </div><!-- .tab-pane  -->

                        </div><!-- .tab-content  -->
                    </div><!-- .nav-tabs-horizontal -->
                </div><!-- .widget -->
            </div><!-- END column -->

        </div>

    </section><!-- #dash-content -->

@endsection
