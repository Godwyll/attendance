<form method="POST" action="{{ route('timetables.destroy',  $timetable->id) }}">
    <div class="panel-body">
        @csrf
        @method('DELETE')  
        <div class="form-group">
            <p>Are you sure you want to delete Timetable Entry?</p>
        </div>
    </div>
    <div class="panel-footer">
        <button class="btn btn-sm btn-success">Yes</button>
        <button class="btn btn-sm btn-danger" data-dismiss="modal" >No</button>
    </div>
</form>  