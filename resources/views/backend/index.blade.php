@extends('backend.master')
@section('content')
     <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard </h3>
        </div>
     <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{'backend/assets/images/dashboard/circle.svg'}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$weekly_sales}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{'backend/assets/images/dashboard/circle.svg'}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Weekly Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$weekly_orders}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{'backend/assets/images/dashboard/circle.svg'}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Subscriber <i class="mdi mdi-human-male mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$subscribers}}</h2>
                    </div>
                </div>
            </div>
        </div>
     <div class="row">
         <div class="col-md-4 stretch-card grid-margin">
             <div class="card bg-gradient-dark card-img-holder text-white">
                 <div class="card-body">
                     <img src="{{'backend/assets/images/dashboard/circle.svg'}}" class="card-img-absolute" alt="circle-image" />
                     <h4 class="font-weight-normal mb-3">Total Orders <i class="mdi mdi-receipt mdi-24px float-right"></i>
                     </h4>
                     <h2 class="mb-5">{{$total_orders}}</h2>
                 </div>
             </div>
         </div>
         <div class="col-md-4 stretch-card grid-margin">
             <div class="card bg-gradient-primary card-img-holder text-white">
                 <div class="card-body">
                     <img src="{{'backend/assets/images/dashboard/circle.svg'}}" class="card-img-absolute" alt="circle-image" />
                     <h4 class="font-weight-normal mb-3">Total Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                     </h4>
                     <h2 class="mb-5">{{$total_sell}} /-</h2>
                 </div>
             </div>
         </div>
         <div class="col-md-4 stretch-card grid-margin">
             <div class="card bg-gradient-danger card-img-holder text-white">
                 <div class="card-body">
                     <img src="{{'backend/assets/images/dashboard/circle.svg'}}" class="card-img-absolute" alt="circle-image" />
                     <h4 class="font-weight-normal mb-3">Returned Products <i class="mdi mdi-keyboard-return mdi-24px float-right"></i>
                     </h4>
                     <h2 class="mb-5">{{$returned_products}}</h2>
                 </div>
             </div>
         </div>
     </div>

@endsection
