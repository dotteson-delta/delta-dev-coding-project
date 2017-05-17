@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ url('/attorneys') }}" class="btn btn-primary" role="button">View Attorneys</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
