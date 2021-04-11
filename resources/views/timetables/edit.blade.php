<form action="{{ route('timetables.update', $timetable->id) }}">
    <div class="panel-body">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Course Code</label> <span class="text-danger">*</span>
                    <input type="text" name="course_code" value="{{ $timetable->course_code }}" class="form-control" placeholder="Eg. TST 101" required>
                </div>
                <div class="col-md-6">
                    <label>Course Name</label> <span class="text-danger">*</span>
                    <input type="text" name="course_name" value="{{ $timetable->course_name }}" class="form-control" placeholder="Eg. Test Course" required>
                </div>
                <div class="col-md-6">
                    <label>Class</label> <span class="text-danger">*</span>
                    <input type="text" name="course_code" value="{{ $timetable->class }}" class="form-control" placeholder="Eg. TS1-CLS" required>
                </div>
                <div class="col-md-6">
                    <label>Total Students</label> <span class="text-danger">*</span>
                    <input type="text" name="course_name" value="{{ $timetable->total_students }}" class="form-control" placeholder="Eg. 143" required>
                </div>
                <div class="col-md-6">
                    <label>Room</label> <span class="text-danger"></span>
                    <input type="text" name="course_code" value="{{ $timetable->room }}" class="form-control" placeholder="Eg. TST-RM" required>
                </div>
                <div class="col-md-6">
                    <label>Date</label> <span class="text-danger text-bold">*</span>
                    <input type="date" name="date" value="{{ $timetable->date }}" placeholder="Eg. 2021-04-12"
                        class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Start Time</label>
                    <input type="text" name="start_time" value="{{ $timetable->start_time }}" placeholder="Eg. 13:00"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>End Time</label>
                    <input type="text" name="end_time" value="{{ $timetable->end_time }}" placeholder="Eg. 15:00"
                        class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <button type="submit" class="btn btn-sm btn-warning">Submit</button>
        <button class="btn btn-sm btn-dark" data-dismiss="modal">Close</button>
    </div>
</form>
