@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Orders<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Product Details</th>
                                    <th>Coupon</th>
                                    <th>Total With Coupon</th>
                                    <th>Total Without Coupon</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    <tr class="text-center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ date('d-m-Y', strtotime($order->created_at))}}</td>
                                        <td>{{$order->customer_name}}</td>
                                        <td>{{$order->customer_phone}}</td>
                                        <td>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Product Code</th>
                                                    <th>Item</th>
                                                    <th>Size</th>
                                                    <th>Color</th>
                                                    <th>Qty</th>
                                                    <th>Unit Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i = 0 ; $i< count(json_decode($order->product_name)) ;$i++)
                                                <tr>
                                                    <td>{{json_decode($order->product_code)[$i]}}</td>
                                                    <td>{{json_decode($order->product_name)[$i]}}</td>
                                                    <td>{{json_decode($order->size)[$i] != 'null' ? json_decode($order->size)[$i] : 'N/A'}}</td>
                                                    <td>{{json_decode($order->color)[$i] != 'null' ? json_decode($order->color)[$i] : 'N/A'}}</td>
                                                    <td>{{json_decode($order->product_qty)[$i]}}</td>
                                                    <td>{{json_decode($order->product_price)[$i]}}</td>
                                                </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            @if(!empty($order->coupon_name))
                                                {{$order->coupon_name}}
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm btn-block disabled">Not Available</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($order->coupon_name))
                                                {{$order->total_with_coupon}}/-
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm btn-block disabled">Not Available</button>
                                            @endif
                                        </td>
                                        <td>{{$order->total_without_coupon}} /-</td>
                                        <td>{{$order->status}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-block" onclick="window.location='{{route('order.show',$order->id)}}'" data-toggle="tooltip" title="View Order">Show</button>
                                            <br/>
                                            @if($order->status == 'pending')
                                            <button type="button" class="btn btn-success btn-block" onclick="window.location='{{route('order.delivered',$order->id)}}'" data-toggle="tooltip" title="Delivered">Delivered</button>
                                            <br/>
                                            <button type="button" class="btn btn-dark btn-block" onclick="window.location='{{route('order.returned',$order->id)}}'" data-toggle="tooltip" title="Returned">Returned</button>
                                            <br/>
                                            <button type="button" class="btn btn-primary btn-block" onclick="window.location='{{route('order.canceled',$order->id)}}'" data-toggle="tooltip" title="Canceled">Canceled</button>
                                            <br/>
                                            @endif
                                            <div class="modal fade" id="delete_modal_{{$order->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Order</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete This Order.Once You Delete This Order</p>
                                                            <p>You Will Delete The Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['order.destroy',$order->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_modal_{{$order->id}}" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center text-info">{{'No Orders Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
