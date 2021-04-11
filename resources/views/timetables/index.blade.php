@extends('layouts.app')

@section('content')
<section class="app-content">

    <div class="row">
        <!-- DOM dataTable -->
        <div class="col-md-9">
            <div class="widget">
                <header class="widget-header">
                    <h4 class="widget-title">Timetable Entries
                        <span class="pull-right btn btn-sm btn-warning" data-toggle="modal" data-target="#add-timetable-modal">CREATE ATTENDANCE TIMETABLE ENTRY</span>
                    </h4>

                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    @php
                        $timetables = App\Models\Timetable::all();
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
                                @foreach ($timetables as $timetable)
                                    @php
                                        $timetableEntry = \App\Models\Timetable::find($timetable->timetable_id);
                                    @endphp
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $timetable->name }}</td>
                                        <td>{{ Helpers::coolDate($timetable->date) }}</td>                                        
                                        <td>{{ Helpers::coolTime($timetable->start_time) }} - {{ Helpers::coolTime($timetable->end_time) }}</td>
                                        <td>{{ $timetableEntry->course_code}} - {{$timetableEntry->course_name}} <strong>({{$timetableEntry->class}})</strong></td>
                                        <td>{{ Helpers::coolDate($timetable->created_at) }}</td>                                        
                                        <td>
                                            <button role="button" data-toggle="modal" data-target="#edit-timetable-modal" data-id="{{ $timetable->id }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                                            <button role="button" data-toggle="modal" data-target="#delete-timetable-modal" data-id="{{ $timetable->id }}" class="btn btn-xs btn-dark"><i class="fa fa-trash-o"></i></button>
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

{{-- ADD TIMETABLE ENTRY MODAL --}}
<div class="modal fade" id="add-timetable-modal" tabindex="-1" role="dialog" aria-labelledby="add-timetable-label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title" id="add-timetable-label">
                    NEW ATTENDANCE TIMETABLE ENTRY
                    <span role="button" class="pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span>                    
                </h4>
            </div>
            <form method="POST" action="{{ route('timetables.store') }}">
                <div class="panel-body">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Course Code</label> <span class="text-danger">*</span>
                                <input type="text" name="course_code" class="form-control" placeholder="Eg. TST 101" required>
                            </div>
                            <div class="col-md-6">
                                <label>Course Name</label> <span class="text-danger">*</span>
                                <input type="text" name="course_name" class="form-control" placeholder="Eg. Test Course" required>
                            </div>
                            <div class="col-md-6">
                                <label>Class</label> <span class="text-danger">*</span>
                                <input type="text" name="course_code" class="form-control" placeholder="Eg. TS1-CLS" required>
                            </div>
                            <div class="col-md-6">
                                <label>Total Students</label> <span class="text-danger">*</span>
                                <input type="text" name="course_name" class="form-control" placeholder="Eg. 143" required>
                            </div>
                            <div class="col-md-6">
                                <label>Room</label> <span class="text-danger"></span>
                                <input type="text" name="course_code" class="form-control" placeholder="Eg. TST-RM" required>
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

{{-- EDIT TIMETABLE ENTRY MODAL --}}
<div class="modal fade" id="edit-timetable-modal" tabindex="-1" role="dialog" aria-labelledby="edit-timetable-label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title" id="edit-timetable-label">
                    EDIT ATTENDANCE TIMETABLE ENTRY
                    <span role="button" class="pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span>                    
                </h4>
            </div>
            <div class="dynamic-content"></div>
        </div>
    </div><!-- END column -->  
</div>

{{-- DELETE TIMETABLE ENTRY MODAL --}}
<div class="modal fade" id="delete-timetable-modal" tabindex="-1" role="dialog" aria-labelledby="delete-timetable-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="panel panel-dark">
            <div class="panel-heading">
                <h4 class="panel-title" id="delete-timetable-label">
                    DELETE ATTENDANCE TIMETABLE ENTRY
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
