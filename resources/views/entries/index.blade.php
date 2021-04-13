@extends('layouts.app')

@section('content')
<section class="app-content">
    <div class="row">
        <!-- DOM dataTable -->
        <div class="col-md-12">
            <div class="widget">
                <header class="widget-header">
                    <h4 class="widget-title">Attendance Entries
                        <a href="{{ route('entries.create') }}" class="pull-right btn btn-sm btn-warning">NEW ATTENDANCE ENTRY</a href="{{ route('entries.create') }}">
                    </h4>

                </header><!-- .widget-header -->
                <hr class="widget-separator">
                <div class="widget-body">
                    @php
                        $entries = App\Models\Entry::orderBy('created_at', 'desc')->get();
                    @endphp
                    
                    @include('entries.list')
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>

</section><!-- #dash-content -->

@endsection
