@php
$i = 1;
$entries = \App\Models\Entry::orderBy('created_at', 'desc')
    ->limit(10)
    ->get();
$student = \App\Models\Student::where('student_no', $student_no)->first();
@endphp

{{-- @if (Helpers::isStudent($student_no)) --}}
@if ($student_no)
    <div class='alert alert-success alert-custom alert-dismissible'><button type='button' class='close'
            data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h5>Student with reference number <strong>{{ $student_no }}</strong> has been marked as present.</h5>
    </div>
@else
    <div class='alert alert-danger alert-custom alert-dismissible'><button type='button' class='close'
            data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h5>Student data was not found.<strong></strong></h5>
    </div>
@endif
<div class="widget">
    <header class="widget-header">
        <h4 class="widget-title">Last 10 Entries
        </h4>
    </header><!-- .widget-header -->
    <hr class="widget-separator">
    <div class="widget-body">
        <div class="table-responsive">
            <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0"
                width="100%">
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
                            <td>
                                <button role="button" data-toggle="modal" data-target="#delete-entry-modal" data-id="{{ $entry->id }}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- .widget-body -->
</div><!-- .widget -->
