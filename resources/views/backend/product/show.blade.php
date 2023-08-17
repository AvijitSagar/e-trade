@extends('backend.master')

@section('title')
    Show product
@endsection

@section('content')
    <section>
        <div class="app-content main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">


                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Show Product</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Product</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h3 class="card-title">Show Product</h3>
                                    </div>
                                    <div>
                                        <h5 class="mt-3 text-center text-success">{{ Session::get('message') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="editable-responsive-table"
                                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                                {{-- <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Category</th>
                                                        <th>Subcategory</th>
                                                        <th>Brand</th>
                                                        <th>Unit</th>
                                                        <th>Product Name</th>
                                                        <th>Product Code</th>
                                                        <th>Regular price</th>
                                                        <th>Selling price</th>
                                                        <th>Stock amount</th>
                                                        <th>Reorder label</th>
                                                        <th>product Image</th>
                                                        <th>Short description</th>
                                                        <th>Long description</th>
                                                        <th>Status</th>
                                                        <th>Featured Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead> --}}
                                                <tbody>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <td>{{$product->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Code</th>
                                                        <td>{{$product->code}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Category</th>
                                                        <td>{{$product->category->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Subcategory</th>
                                                        <td>{{$product->subCategory->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Brand</th>
                                                        <td>{{$product->brand->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Unit</th>
                                                        <td>{{$product->unit->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Regular price</th>
                                                        <td>{{$product->regular_price}} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Selling price</th>
                                                        <td>{{$product->selling_price}} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Stock amount</th>
                                                        <td>{{$product->stock_amount}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Reorder label</th>
                                                        <td>{{$product->reorder_label}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>product Image</th>
                                                        <td>
                                                            <img src="{{asset($product->image)}}" height="70px" width="70px" alt="product_image">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Other Image</th>
                                                        <td>
                                                            @foreach ($product->othersImage as $otherImage)
                                                                <img src="{{asset($otherImage->image)}}" height="70px" width="70px" alt="product_other_images">
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Short description</th>
                                                        <td>{{$product->short_description}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Long description</th>
                                                        <td>{!! $product->long_description !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Featured Status</th>
                                                        <td>
                                                            <b><span class="{{$product->featured_status == 1 ? 'text-secondary' : 'text-info'}}">{{$product->featured_status == 1 ? 'New arraival' : 'Explore'}}</span></b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td>
                                                            <b><span class="{{$product->status == 1 ? 'text-green' : 'text-red'}}">{{$product->status == 1 ? 'Active' : 'Inactive'}}</span></b>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->

                </div>
            </div>
        </div>
    </section>
@endsection
