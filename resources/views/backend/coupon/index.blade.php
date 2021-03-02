@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Coupons<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L</th>
                                    <th> Name</th>
                                    <th> Percentage </th>
                                    <th> Starting Date </th>
                                    <th> Ending Date </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($coupons as $coupon)
                                    <tr class="text-center">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$coupon->coupon_name}} </td>
                                        <td>{{$coupon->percent}} % </td>
                                        <td>{{$coupon->starting_date}} </td>
                                        <td>{{$coupon->ending_date}} </td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-success btn-icon" onclick="window.location='{{route('coupon.edit',$coupon->id)}}'" data-toggle="tooltip" title="Edit"><i class="mdi mdi-pencil"></i></button>
                                            <div class="modal fade" id="delete_modal_{{$coupon->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Coupon</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete This Coupon.Once You Delete This Coupon</p>
                                                            <p>You Will Delete The Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['coupon.destroy',$coupon->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$coupon->id}}"><i class="mdi mdi-delete-forever"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-info">{{'No Coupon Created Yet'}}</td>
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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
