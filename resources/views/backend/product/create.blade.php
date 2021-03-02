@extends('backend.master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'product.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New Product</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option selected disabled value="">choose an option</option>
                            @foreach($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="sub_category_field" style="display:none;">
                        <label for="sub_category">Sub-Category</label>
                        <select class="form-control" name="sub_category" id="sub_category" required></select>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="select_role" >Upload Photo (First Image Will be on the Display</label>
                                <input type='file' class="form-control" id="imageUpload" name="photo[]" accept=".png, .jpg, .jpeg" required/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="item"></label>
                                <button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon text-center"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="append_item">

                    </div>
                    <div class="form-group">
                        <label for="pc">Product Code</label>
                        <input type="text" class="form-control" id="p_code" name="p_code" placeholder="Product Code" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Product Title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="8" cols="20" class="form-control" id="description" name="description" placeholder="Product Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" class="form-control" id="size" name="size" placeholder="Seperate with comma ,">
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Seperate with comma ,">
                    </div>
                    <div class="form-group">
                        <label for="pf">Product's Feature</label>
                        <select class="form-control" name="pf">
                            <option selected disabled value="">choose an option</option>
                            <option value="featured">Featured</option>
                            <option value="new">New Product</option>
                            <option value="best">Best Seller</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Offer</label>
                        <select class="form-control" id="offer" name="offer">
                            <option selected disabled value="">choose an option</option>
                            @foreach($offers as $offer)
                                <option value="{{$offer->id}}">{{$offer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pp">Previous Price /(unit)</label>
                        <input type="number" class="form-control" id="pp" name="pp" placeholder="previous price (not required)">
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount %</label>
                        <input type="number" class="form-control" id="discount" name="discount" placeholder="Discount">
                    </div>
                    <div class="form-group">
                        <label for="np">New Price/ (unit)</label>
                        <input type="number" class="form-control" id="np" name="np" placeholder="New Price" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create Product </button>
        </div>
    </div>
    {!! Form::close() !!}

    <script type="text/javascript">
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '#category', function (){
            $('#sub_category').empty();
            let cname = $(this).val();
            $.ajax({
                url : '/category_name/' + cname,
                method : 'GET',
                success:function(data){
                    if(data.length != 0){
                        $('#sub_category_field').show();
                        $('#sub_category').append('<option selected disabled value="">Choose An Option</option>');
                        jQuery.each( data, function( item, value ) {
                            $('#sub_category').append("<option value='"+ value.sub_category + "'>" + value.sub_category + "</option>");
                        });
                    }
                }
            });
        });
        $(document).on('input','#discount',function(){
                let diffrence = ($(this).val() * _('pp').value) /100;
                let discount_amount = _('pp').value - diffrence;
                 _('np').value = discount_amount;
        })
        $(document).on('click', '#add_item', function (){
            var html ='';
            html += '<div class="row"> <div class="col-md-8"> <div class="form-group"><label for="select_role" ></label> <input type="file" class="form-control" id="imageUpload" name="photo[]" accept=".png, .jpg, .jpeg"> </div> </div> <div class="col-md-2"> <div class="form-group"><label for="item"></label><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon"></i></button></div> </div><div class="col-md-2"><label for="item"></label> <div class="form-group"><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="minus_item"><i class="mdi mdi-minus menu-icon"></i></button></div> </div></div>'
            $('#append_item').append(html);
        });
        $(document).on('click','#minus_item',function(){
            $(this).parent().parent().parent().remove();

        });
    </script>
@endsection
