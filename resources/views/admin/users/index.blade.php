@extends('layouts.admin')

@section('content')
<section class="app-content">

    <div class="row">
        <!-- DOM dataTable -->
        <div class="col-md-9">
            <div class="widget">
                <header class="widget-header">
                    <h4 class="widget-title">Users
                        <span class="pull-right btn btn-sm btn-danger" data-toggle="modal" data-target="#add-user-modal">ADD USER</span>
                    </h4>

                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    @php
                        $users = App\User::all();
                        $i = 1;                        
                    @endphp

                    <div class="table-responsive">
                        <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>                                    
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Timestamp</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ Helpers::coolDate($user->created_at) }}</td>                                        
                                        <td>
                                            <button role="button" data-toggle="modal" data-target="#edit-user-modal" data-id="{{ $user->id }}" class="btn btn-xs btn-danger"><i class="fa fa-edit"></i></button>
                                            <button role="button" data-toggle="modal" data-target="#delete-user-modal" data-id="{{ $user->id }}" class="btn btn-xs btn-deepOrange"><i class="fa fa-trash-o"></i></button>
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

{{-- ADD USER MODAL --}}
<div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-labelledby="add-user-label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title" id="add-user-label">
                    ADD NEW USER
                    <span role="button" class="pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span>                    
                </h4>
            </div>
            <form method="POST" action="{{ route('users.store') }}">
                <div class="panel-body">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sm btn-danger">Submit</button>
                    <button class="btn btn-sm btn-deepOrange" data-dismiss="modal" >Close</button>
                </div>
            </form>                
        </div>
    </div><!-- END column -->  
</div>

{{-- EDIT USER MODAL --}}
<div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-labelledby="edit-user-label" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title" id="edit-user-label">
                    EDIT USER
                    <span role="button" class="pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span>                    
                </h4>
            </div>
            <div class="dynamic-content"></div>
        </div>
    </div><!-- END column -->  
</div>

{{-- DELETE USER MODAL --}}
<div class="modal fade" id="delete-user-modal" tabindex="-1" role="dialog" aria-labelledby="delete-user-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title" id="delete-user-label">
                    DELETE USER
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
