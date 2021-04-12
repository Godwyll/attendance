@extends('layouts.app')

@section('content')
    <section class="app-content">
        @php
            $i = 1;
            $timetableEntries = \App\Models\Timetable::where('date', '>=', date('Y-m-d', strtotime(date('Y-m-d') . '-1 day')))
                ->where('date', '<=', date('Y-m-d', strtotime(date('Y-m-d') . '+2 days')))
                ->get();
        @endphp


        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">
                            ATTENDANCE SESSION
                            @if (session('session_id'))
                                @php
                                    $activeSession = \App\Models\Timetable::find(session('session_id'));
                                @endphp
                                <strong>{{ $activeSession->course_code }} - {{ $activeSession->course_name }}
                                    [{{ $activeSession->class }}] ({{ Helpers::coolTime($activeSession->start_time) }} -
                                    {{ Helpers::coolTime($activeSession->end_time) }})</strong>
                            @endif
                        </h4>
                        <span class="pull-right">
                            <form action="{{ route('session.set') }}" method="post">
                                @csrf
                                <strong class="text-warning">Set Session: </strong>&nbsp;
                                <select name="timetable_id" id="session" required>
                                    <option value="">- Select -</option>
                                    @foreach ($timetableEntries as $timetableEntry)
                                        <option value="{{ $timetableEntry->id }}">{{ $timetableEntry->course_code }}
                                            {{ $timetableEntry->course_name }} - {{ $timetableEntry->class }} -
                                            {{ $timetableEntry->room }} ({{ $timetableEntry->name }}
                                            ({{ Helpers::coolDate($timetableEntry->date) }}
                                            {{ Helpers::coolTime($timetableEntry->start_time) }} -
                                            {{ Helpers::coolTime($timetableEntry->end_time) }})</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-xs btn-warning">Go</button>
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
                                                        <table id="default-datatable" data-plugin="DataTable"
                                                            class="table table-striped" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Student No.</th>
                                                                    <th>Student Name</th>
                                                                    <th>Session</th>
                                                                    <th>Timestamp</th>
                                                                    <th>Options</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($entries as $entry)
                                                                    @php
                                                                        $timetable = \App\Models\Timetable::find($entry->session_id);
                                                                        $student = \App\Models\Student::where('student_no', $entry->student_no)->first();
                                                                    @endphp
                                                                    <tr>
                                                                        <td>{{ $i++ }}</td>
                                                                        <td>{{ $entry->student_no }}</td>
                                                                        <td>{{ @$student->surname }}
                                                                            {{ @$student->othernames }}</td>
                                                                        <td>{{ $timetable->course_code }} -
                                                                            {{ $timetable->course_name }}
                                                                            [{{ $timetable->class }}]
                                                                            ({{ Helpers::coolTime($timetable->start_time) }}
                                                                            -
                                                                            {{ Helpers::coolTime($timetable->end_time) }})
                                                                        </td>
                                                                        <td>{{ Helpers::ago($entry->created_at) }}</td>
                                                                        <td></td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- .widget-body -->
                                            </div><!-- .widget -->
                                        @endif


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
