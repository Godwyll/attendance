@php
    $i = 1;                        
@endphp

<div class="table-responsive">
<table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
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
                <td>{{ $timetable->course_code }} - {{ $timetable->course_name }}
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
