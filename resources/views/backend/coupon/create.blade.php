@extends('backend.master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'coupon.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New Coupon</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="coupon_name">Name</label>
                        <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="Coupon Name" required>
                    </div>
                    <div class="form-group">
                        <label for="percentage">percentage</label>
                        <input type="number" class="form-control" id="percentage" name="percentage" placeholder="Percentage" min="1" max="100" required>
                    </div>
                    <div class="form-group">
                        <label for="starting_date">Starting Date</label>
                        <input type="date" class="form-control" id="starting_date" name="starting_date" required>
                    </div>
                    <div class="form-group">
                        <label for="ending_date">Ending Date</label>
                        <input type="date" class="form-control" id="ending_date" name="ending_date" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create Coupon </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
