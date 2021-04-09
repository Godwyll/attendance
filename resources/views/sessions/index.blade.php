@extends('layouts.app')

@section('content')
<section class="app-content">

    <div class="row">
        <!-- DOM dataTable -->
        <div class="col-md-9">
            <div class="widget">
                <header class="widget-header">
                    <h4 class="widget-title">Sessions
                        <span class="pull-right btn btn-sm btn-warning" data-toggle="modal" data-target="#add-session-modal">CREATE ATTENDANCE SESSION</span>
                    </h4>

                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    @php
                        $sessions = App\Models\Session::all();
                        $i = 1;                        
                    @endphp

                    <div class="table-responsive">
                        <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>                                    
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Duration</th>
                                    <th>Timetable Entry</th>
                                    <th>Timestamp</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sessions as $session)
                                    @php
                                        $timetableEntry = \App\Models\Timetable::find($session->timetable_id);
                                    @endphp
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $session->name }}</td>
                                        <td>{{ Helpers::coolDate($session->date) }}</td>                                        
                                        <td>{{ Helpers::coolTime($session->start_time) }} - {{ Helpers::coolTime($session->end_time) }}</td>
                                        <td>{{ $timetableEntry->course_code}} - {{$timetableEntry->course_name}} <strong>({{$timetableEntry->class}})</strong></td>
                                        <td>{{ Helpers::coolDate($session->created_at) }}</td>                                        
                                        <td>
                                            <button role="button" data-toggle="modal" data-target="#edit-session-modal" data-id="{{ $session->id }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                                            <button role="button" data-toggle="modal" data-target="#delete-session-modal" data-id="{{ $session->id }}" class="btn btn-xs btn-dark"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>

</section><!-- #dash-content -->


{{-- MODALS --}}

{{-- ADD SESSION MODAL --}}
<div class="modal fade" id="add-session-modal" tabindex="-1" role="dialog" aria-labelledby="add-session-label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title" id="add-session-label">
                    NEW ATTENDANCE SESSION
                    <span role="button" class="pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span>                    
                </h4>
            </div>
            <form method="POST" action="{{ route('sessions.store') }}">
                <div class="panel-body">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Session Name</label> <span class="text-danger">*</span>
                                <input type="text" name="name" class="form-control" placeholder="Eg. End of Sem Exams" required>
                            </div>
                            <div class="col-md-6">
                                <label>Date</label> <span class="text-danger">*</span>
                                <input type="date" name="date" placeholder="Eg. 2021-04-12" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Start Time</label>
                                <input type="text" name="start_time" placeholder="Eg. 13:00" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>End Time</label>
                                <input type="text" name="end_time" placeholder="Eg. 15:00" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label>Timetable Entry</label>
                                <select name="timetable_id" class="form-control" required>
                                    @php
                                        // $timetableEntries = DB::table('timetables')->select('*')
                                        // ->whereNotIn('id', function($query){
                                        //     $query->select('timetable_id')->from('sessions');
                                        // })->get();
                                        $timetableEntries = \App\Models\Timetable::all();
                                    @endphp
                                    <option value="">- Select -</option>
                                    @foreach ($timetableEntries as $timetableEntry)
                                        <option value="{{$timetableEntry->id}}">{{$timetableEntry->course_code}} - {{$timetableEntry->course_name}} <strong>({{$timetableEntry->class}})</strong></option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sm btn-warning">Submit</button>
                    <button class="btn btn-sm btn-dark" data-dismiss="modal" >Close</button>
                </div>
            </form>                
        </div>
    </div><!-- END column -->  
</div>

{{-- EDIT SESSION MODAL --}}
<div class="modal fade" id="edit-session-modal" tabindex="-1" role="dialog" aria-labelledby="edit-session-label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title" id="edit-session-label">
                    EDIT ATTENDANCE SESSION
                    <span role="button" class="pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span>                    
                </h4>
            </div>
            <div class="dynamic-content"></div>
        </div>
    </div><!-- END column -->  
</div>

{{-- DELETE SESSION MODAL --}}
<div class="modal fade" id="delete-session-modal" tabindex="-1" role="dialog" aria-labelledby="delete-session-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="panel panel-dark">
            <div class="panel-heading">
                <h4 class="panel-title" id="delete-session-label">
                    DELETE ATTENDANCE SESSION
                    <span role="button" class="pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span>                    
                </h4>
            </div>
            <div class="dynamic-content"></div>
        </div>
    </div><!-- END column -->  
</div>


@endsection
