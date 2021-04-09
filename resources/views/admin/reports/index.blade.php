@extends('layouts.admin')

@section('content')
<section class="app-content">

    <div class="row">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">GENERATE REPORT</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="m-b-xl">
                    <form class="form-inline" action="{{ route('report.generate') }}" method="post">
                        @csrf
                        {{-- <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div> --}}
                        <div class="form-group">
                            <label>Start Date: </label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>End Date: </label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                </div>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->        

    </div>

</section><!-- #dash-content -->

@endsection
