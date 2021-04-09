<form action="{{ route('sessions.update', $session->id) }}">
    <div class="panel-body">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Session Name</label> <span class="text-danger text-bold">*</span>
                    <input type="text" name="name" value="{{ $session->name }}" placeholder="Eg. End of Sem Exams" class="form-control"  required>
                </div>
                <div class="col-md-6">
                    <label>Course</label>
                    <input type="text" name="course" value="{{ $session->course }}" placeholder="Eg. ENGL 151 COMMUNICATION SKILLS I" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Venue</label>
                    <input type="text" name="venue" value="{{ $session->venue }}" placeholder="Eg. Petroleum Building FF5" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Date</label> <span class="text-danger text-bold">*</span>
                    <input type="date" name="date" value="{{ $session->date }}" placeholder="Eg. 2021-04-12" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Start Time</label>
                    <input type="text" name="start_time" value="{{ $session->start_time }}" placeholder="Eg. 13:00" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>End Time</label>
                    <input type="text" name="end_time" value="{{ $session->end_time }}" placeholder="Eg. 15:00" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <button type="submit" class="btn btn-sm btn-warning">Submit</button>
        <button class="btn btn-sm btn-dark" data-dismiss="modal" >Close</button>
    </div>
</form>                
