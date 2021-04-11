@php
    $i=1;
    $entries = \App\Models\Entry::orderBy('created_at', 'desc')->limit(10)->get(); 
    $student = \App\Models\Student::where('student_no', $student_no)->first();
@endphp

{{-- @if ( Helpers::isStudent($student_no)) --}}
@if ($student_no)
    <div class='alert alert-warning alert-custom alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h5>Student with reference number <strong>{{ $student_no }}</strong> has been marked as present.</h5></div>
@else
<div class='alert alert-danger alert-custom alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h5>Student data was not found.<strong></strong></h5></div>    
@endif
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
</div><!-- .widget -->