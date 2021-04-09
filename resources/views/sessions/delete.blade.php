<form method="POST" action="{{ route('sessions.destroy',  $session->id) }}">
    <div class="panel-body">
        @csrf
        @method('DELETE')  
        <div class="form-group">
            <p>Are you sure you want to delete Session?</p>
        </div>
    </div>
    <div class="panel-footer">
        <button class="btn btn-sm btn-success">Yes</button>
        <button class="btn btn-sm btn-danger" data-dismiss="modal" >No</button>
    </div>
</form>  