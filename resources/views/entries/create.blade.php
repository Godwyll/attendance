@extends('layouts.app')

@section('content')
    <section class="app-content">
        @php
            $i = 1;
            $sessions = \App\Models\Session::all();
            // $distinctBookings = \App\Booking::selectRaw('DISTINCT student_no, appointment_date')->where('appointment_date', date('Y-m-d'))->get();
            // $checkIns = \App\Booking::selectRaw('DISTINCT student_no, appointment_date')->where('appointment_date', date('Y-m-d'))->where('status', '>=', 1)->get();
            // $checkOuts = \App\Booking::selectRaw('DISTINCT student_no, appointment_date')->where('appointment_date', date('Y-m-d'))->where('status', 2)->get();
            // $outstandingBookings = \App\Booking::selectRaw('DISTINCT student_no, appointment_date')->where('appointment_date', date('Y-m-d'))->where('status', 0)->get();
        @endphp


        <div class="row">
            <div class="col-md-8">
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">
                            ATTENDANCE SESSION
                            @if (session('session_id'))
                                @php
                                    $activeSession = \App\Models\Session::find(session('session_id'));
                                    // $activeSession = DB::table('sessions')
                                    //     ->rightJoin('timetables', 'sessions.timetable_id', '=', 'timetables.id')
                                    //     ->get();
                                    // print_r($activeSession[0]);
                                @endphp
                                {{-- <strong>({{ $activeSession->name }})</strong> --}}
                                <strong>({{ session('session_id') }})</strong>
                                {{-- <strong>( {{ $activeSession[0]->name }} {{ $activeSession[0]->course_code }} {{ $activeSession[0]->course_name }} )</strong> --}}
                            @endif
                        </h4>
                        <span class="pull-right">
                            <form action="{{ route('sessions.set') }}" method="post">
                                @csrf
                                <strong>Set Session: </strong>&nbsp;
                                <select name="session_id" id="session">
                                    <option value="">- Select -</option>
                                    @foreach ($sessions as $session)
                                        @php
                                            $timetableEntry = \App\Models\Timetable::find($session->timetable_id);
                                        @endphp
                                        <option value="{{ $session->id }}">{{ $timetableEntry->course_code }}
                                            {{ $timetableEntry->course_name }} - {{ $timetableEntry->class }} -
                                            {{ $timetableEntry->room }} ({{ $session->name }}
                                            {{ Helpers::coolTime($session->start_time) }} -
                                            {{ Helpers::coolTime($session->end_time) }})</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-xs btn-dark">Go</button>
                            </form>
                        </span>

                    </header><!-- .widget-header -->
                    <hr class="widget-separator">
                    <div class="widget-body">
                        {{-- <div class="m-b-xl">
                        <h4 class="m-b-md">Example 1</h4>
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="exampleInputName2">Name</label>
                                <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                            </div>
                            <button type="submit" class="btn btn-default">Send invitation</button>
                        </form>
                    </div> --}}
                        <div class="promo">
                            <div class="promo-body">
                                <form id="attendance-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-1">
                                            <div class="form-group">
                                                <input name="student_no" id="student_no" type="number"
                                                    class="form-control promo-search-field"
                                                    placeholder="Please scan Student ID card with Barcode Scanner" required
                                                    autofocus>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <input type="submit" class="btn btn-warning promo-search-submit" value="Go">
                                        </div>
                                    </div>
                                </form>

                                <hr class="widget-separator">

                                <div class="col-offset-2">
                                    <div id="message-box">
                                        @php
                                            $i = 1;
                                            $entries = \App\Models\Entry::orderBy('created_at', 'desc')
                                                ->limit(10)
                                                ->get();
                                        @endphp

                                        @if (count($entries) > 0)
                                        <div class="widget">
                                            <header class="widget-header">
                                                <h4 class="widget-title">Last 10 Entries
                                                </h4>
                                            </header><!-- .widget-header -->
                                            <hr class="widget-separator">
                                            <div class="widget-body">
                                                <div class="table-responsive">
                                                    <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Student No.</th>
                                                                <th>Attendance Session</th>
                                                                <th>Timestamp</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($entries as $entry)
                                                                <tr>
                                                                    <td>{{ $i++ }}</td>
                                                                    <td>{{ $entry->student_no }}</td>
                                                                    <td>{{ $entry->session_id }}</td>
                                                                    <td>{{ Helpers::ago($entry->created_at) }}</td>
                                                                    <td></td>
                                                                </tr>                                       
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- .widget-body -->
                                        </div><!-- .widget -->                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="pace pace-active">
                            <div class="pace-progress" data-progress-text="100%" data-progress="99"
                                style="transform: translate3d(100%, 0px, 0px);">
                                <div class="pace-progress-inner"></div>
                            </div>
                            <div class="pace-activity"></div>
                        </div> --}}

                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section><!-- #dash-content -->

@endsection
