@extends('layouts.app')

@section('content')
<section class="app-content">

    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="m-b-lg nav-tabs-horizontal">
                    <!-- tabs list -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"  class="active"><a href="#today" aria-controls="all" role="tab" data-toggle="tab">Today's Entries</a></li>
                        {{-- <li role="presentation"><a href="#all" aria-controls="tab-3" role="tab" data-toggle="tab">All Appointments</a></li> --}}
                    </ul><!-- .nav-tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content p-md">

                        <div role="tabpanel" class="tab-pane in active fade" id="today">
                            <!-- DOM dataTable -->
                            <div class="">
                                <div class="widget">
                                    <header class="widget-header">
                                        <h4 class="widget-title">Today's Entries ({{ date('D, jS M Y') }})
                                        <span class="pull-right"> 
                                            <form action="{{ route('/') }}" method="post">
                                                @csrf
                                                <strong>Change Date: </strong>&nbsp;
                                                <input type="date" name="date">
                                                <button type="submit" class="btn btn-xs btn-dark">Go</button>
                                            </form>
                                        </span>                    
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
                                                        <th>Student Name</th>
                                                        <th>Token</th>
                                                        <th>Appointment Date</th>
                                                        <th>Timestamp</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($distinctBookings as $distinctBooking)
                                                        @php
                                                            $booking = \App\Booking::where('student_no', $distinctBooking->student_no)->where('appointment_date', $distinctBooking->appointment_date)->first();
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ @$booking->student_no }}</td>
                                                            <td>{{ @$booking->student_name }}</td>
                                                            <td>{{ @$booking->token }}</td>
                                                            <td>{{ Helpers::coolDate(@$booking->appointment_date) }}</td>
                                                            <td>{{ @$booking->created_at }}</td>
                                                            <td></td>
                                                        </tr>                                       
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .widget-body -->
                                </div><!-- .widget -->
                            </div><!-- END column -->

                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="all">
                            <div class="">
                            </div><!-- END column -->
                    
                        </div><!-- .tab-pane  -->

                    </div><!-- .tab-content  -->
                </div><!-- .nav-tabs-horizontal -->
            </div><!-- .widget -->
        </div><!-- END column -->

    </div>

</section><!-- #dash-content -->

@endsection
