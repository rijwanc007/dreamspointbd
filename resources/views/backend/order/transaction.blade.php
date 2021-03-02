@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => 'order.date_search_transaction','method' => 'GET']) !!}
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="age">Date From</label>
                        <input type="date" class="form-control" id="date_from" name="date_from" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="age">Date To</label>
                        <input type="date" class="form-control" id="date_to" name="date_to" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="none"></label>
                        <button class="btn btn-gradient-primary btn-lg btn-block form-control" id="search_balance">Search</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Transaction History<hr/></h2><br/>
                            <h4 class="text-center">As @if(!empty($from)) {{$from}} To @endif {{$to}}</h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L</th>
                                    <th>Date</th>
                                    <th>Order Id</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    <tr class="text-center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ date('d-m-Y', strtotime($order->created_at))}}</td>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->product_sub_total}} /-</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-info">{{'No Transaction Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <td colspan="3" class="text-info">Total</td>
                                    <td class="text-info">{{$orders->sum('product_sub_total')}} /-</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
