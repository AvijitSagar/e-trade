@extends('backend.master')

@section('title')
    Product
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
                            <h1 class="page-title">Add Product</h1>
                        </div>
                        
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <div>
                                <h5 class="mt-3 text-center text-success">{{Session::get('message')}}</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    @method('POST')
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="category_id">Select Category</label>
                                            <select name="category_id" required id="category_id" class="form-control" onchange="getSubCategoryByCategory(this.value)">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger pt-2">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="sub_category_id">Select Subcategory</label>
                                            <select name="sub_category_id" required id="sub_category_id" class="form-control">
                                                <option value="" disabled selected>Select Subcategory</option>
                                                {{-- now category wise subcategory name coming from jquery so dont need the php foreach loop --}}
                                                @foreach ($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger pt-2">{{$errors->has('sub_category_id') ? $errors->first('sub_category_id') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="brand_id">Select Brand</label>
                                            <select name="brand_id" required id="brand_id" class="form-control">
                                                <option value="" disabled selected>Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger pt-2">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="unit_id">Select Unit</label>
                                            <select name="unit_id" required id="unit_id" class="form-control">
                                                <option value="" disabled selected>Select unit</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger pt-2">{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" required>
                                            <p class="text-danger pt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="code">Product Code</label>
                                            <input type="text" name="code" class="form-control" id="code" placeholder="Enter product code" required>
                                            <p class="text-danger pt-2">{{$errors->has('code') ? $errors->first('code') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="product_price">Product Price</label>
                                            <div class="input-group">
                                                <div>
                                                    <input type="text" name="regular_price" id="product_price" placeholder="Enter regular price" class="form-control">
                                                    <p class="text-danger pt-2">{{$errors->has('regular_price') ? $errors->first('regular_price') : ''}}</p>
                                                </div>
                                                
                                                <div>
                                                    <input type="text" name="selling_price" id="product_price" placeholder="Enter selling price" class="form-control">
                                                    <p class="text-danger pt-2">{{$errors->has('selling_price') ? $errors->first('selling_price') : ''}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="stock_status">Stock Status</label>
                                            <div class="input-group">
                                                <div>
                                                    <input type="text" name="stock_amount" id="stock_status" placeholder="Enter stock Amount" class="form-control">
                                                    <p class="text-danger pt-2">{{$errors->has('stock_amount') ? $errors->first('stock_amount') : ''}}</p>
                                                </div>
                                                <div>
                                                    <input type="text" name="reorder_label" id="stock_status" placeholder="Enter reorder Label" class="form-control">
                                                    <p class="text-danger pt-2">{{$errors->has('reorder_label') ? $errors->first('reorder_label') : ''}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="image">Product image</label>
                                            <input type="file" name="image" accept="image/*" class="form-control" id="image" placeholder="" required>
                                            <p class="text-danger pt-2">{{$errors->has('image') ? $errors->first('image') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="others_image">Others image</label>
                                            <input type="file" name="others_image[]" accept="image/*" class="form-control" id="others_image" placeholder="" multiple>
                                            <p class="text-danger pt-2">{{$errors->has('others_image') ? $errors->first('others_image') : ''}}</p>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="short_description">Short description</label>
                                            <textarea name="short_description" class="form-control" id="short_description" cols="30" rows="5" placeholder="Enter a short description"></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="summernote">Long description</label>
                                            <textarea name="long_description" id="summernote" class="form-control" placeholder="Enter a long description"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Add Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection