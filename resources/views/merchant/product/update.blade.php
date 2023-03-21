@include("merchant.include.header");
@include("merchant.include.sidebar");
@php
$product_details_row=DB::table('product_details')->where('product_id','=',$product->id)->first();
@endphp
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
    <h4 class="card-title mb-0 flex-grow-1">Update Product</h4>
    @if(session()->has('success'))
        <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-alert-line label-icon"></i><strong>Error</strong> - {{ session()->get('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>     
    @endif

    @if ($errors->any())
    <div class="alert alert-danger p-1 mt-2">
        <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
    @endif
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{url('/merchant/product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <div class="row gy-4">
                                   
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Category Name*</label>
                                                <select class="form-control" name="cat_id" id="cat_id" required>
                                                    <option value="">Select Category</option>
                                                    @php
                                                    $row=DB::table('categories')->get();
                                                    @endphp
                                                    @foreach ($row as $details)
                                                    <option value="{{ $details->id }}" {{ $product->cat_id==$details->id?'selected':'' }}>{{ $details->category }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Subcategory Name*</label>
                                                <select class="form-control" name="subcat_id" id="subcat_id" required>
                                                    @php
                                                    $row=DB::table('subcategories')->where('cat_id','=',$product->cat_id)->get();
                                                    @endphp
                                                    @foreach ($row as $details)
                                                    <option value="{{ $details->id }}" {{ $product->subcat_id==$details->id?'selected':'' }}>{{ $details->subcategory }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Mega Category Name*</label>
                                                <select class="form-control" name="megacat_id" id="megacat_id" required>
                                                    @php
                                                    $row=DB::table('megacategories')->where('subcat_id','=',$product->subcat_id)->get();
                                                    @endphp
                                                    @foreach ($row as $details)
                                                    <option value="{{ $details->id }}" {{ $product->megacat_id==$details->id?'selected':'' }}>{{ $details->megacategory }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Title*</label>
                                                <input type="text" class="form-control" name="title" placeholder="Product Title" value="{{ $product->title }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Main Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <input type="hidden" class="form-control" name="previous_image" value="{{ $product->main_image }}">
                                                <span style="color:red;">Max image size 1000kb</span>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Available Colors (Optional)</label>
                                                <input type="text" class="form-control" name="colors" placeholder="Colors" value="{{ $product->colors }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-12">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Product Description*</label>
                                                <textarea id="editor" class="form-control" name="description" required>{{ $product->description }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-xxl-3 col-md-3">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Image 1 (Optional)</label>
                                                <input type="file" class="form-control" name="img1" >
                                                <input type="hidden" class="form-control" name="previous_img1" value="{{ $product->img1 }}">
                                                <span style="color:red;">Max image size 1000kb</span>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-3">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Image 2 (Optional)</label>
                                                <input type="file" class="form-control" name="img2" >
                                                <input type="hidden" class="form-control" name="previous_img2" value="{{ $product->img2 }}">
                                                <span style="color:red;">Max image size 1000kb</span>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-3">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Image 3 (Optional)</label>
                                                <input type="file" class="form-control" name="img3" >
                                                <input type="hidden" class="form-control" name="previous_img3" value="{{ $product->img3 }}">
                                                <span style="color:red;">Max image size 1000kb</span>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-3">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Image 4 (Optional)</label>
                                                <input type="file" class="form-control" name="img4" >
                                                <input type="hidden" class="form-control" name="previous_img4" value="{{ $product->img4 }}">
                                                <span style="color:red;">Max image size 1000kb</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Attribute Type*</label>
                                                <select class="form-control" name="attr_type" required>
                                                    <option value="">Select Attribute</option>
                                                    <option value="Size" {{ $product_details_row->attr_type=='Size'?'selected':'' }}>Size</option>
                                                    <option value="Quantity" {{ $product_details_row->attr_type=='Quantity'?'selected':'' }}>Quantity</option>
                                                    <option value="Measurement" {{ $product_details_row->attr_type=='Measurement'?'selected':'' }}>Measurement</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4 mt-4">
                                            <div>
                                                <button type="button" class="btn btn-info" id="addbtn">Add+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="addsection">
    @php
    $product_details=DB::table('product_details')->where('product_id','=',$product->id)->get();
    @endphp
    @foreach ($product_details as $product_details_result)
    <div class="row my-4">
        <div class="col-xxl-3 col-md-3">
                <label for="placeholderInput" class="form-label">Attribute Value</label>
                <input type="text" class="form-control" name="attr_value[]" value="{{ $product_details_result->attr_value }}"  placeholder="eg. XL/ XXL / 50g / 100g">
                <input type="hidden" class="form-control" name="product_details_id[]" value="{{ $product_details_result->id }}"  >
        </div>
        <div class="col-xxl-3 col-md-3">
            <label for="placeholderInput" class="form-label">Market Price</label>
            <input type="number" step="any" class="form-control" name="market_price[]" value="{{ $product_details_result->market_price }}"  placeholder="Enter MRP">
        </div>
        <div class="col-xxl-3 col-md-3">
            <label for="placeholderInput" class="form-label">Sale Price</label>
            <input type="number" step="any" class="form-control" name="sale_price[]" value="{{ $product_details_result->sale_price }}"  placeholder="Enter Sale Price">
        </div>
        <div class="col-xxl-3 col-md-3">
            <label for="placeholderInput" class="form-label">Stock</label>
            <input type="number" step="any" class="form-control" name="stock[]" value="{{ $product_details_result->stock }}"  placeholder="Enter Stock">
        </div>
    </div>
    @endforeach
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-3 col-md-6 pt-4">
                                            <div class="form-floating">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@include("merchant.include.footer");

<script>
    $("#cat_id").on('change',function(){
            var category=$(this).val();
            // alert(category);
            $("#subcat_id").html("<option value=''>Select Subcategory</option>");
                $.ajax({
                    url:"{{ url('merchant/get_subcategory') }}",
                    type:'post',
                    data:'category='+category+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#subcat_id").append(data);
                    }
                  });
        })
    $("#subcat_id").on('change',function(){
            var subcat_id=$(this).val();
            // alert(category);
            $("#megacat_id").html("<option value=''>Select Megacategory</option>");
                $.ajax({
                    url:"{{ url('merchant/get_megacategory') }}",
                    type:'post',
                    data:'subcat_id='+subcat_id+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#megacat_id").append(data);
                    }
                  });
    })

    $("#addbtn").on('click',function(){
        $("#addsection").append('<div class="row my-4"><div class="col-xxl-3 col-md-3"><label for="placeholderInput" class="form-label">Attribute Value</label><input type="text" class="form-control" name="attr_value[]"  placeholder="eg. XL/ XXL / 50g / 100g"><input type="hidden" class="form-control" name="product_details_id[]" value="0" ></div><div class="col-xxl-3 col-md-3"><label for="placeholderInput" class="form-label">Market Price</label><input type="number" step="any" class="form-control" name="market_price[]"  placeholder="Enter MRP"></div><div class="col-xxl-3 col-md-3"><label for="placeholderInput" class="form-label">Sale Price</label><input type="number" step="any" class="form-control" name="sale_price[]"  placeholder="Enter Sale Price"></div><div class="col-xxl-3 col-md-3"><label for="placeholderInput" class="form-label">Stock</label><input type="number" step="any" class="form-control" name="stock[]"  placeholder="Enter Stock"></div></div>');
    })
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>