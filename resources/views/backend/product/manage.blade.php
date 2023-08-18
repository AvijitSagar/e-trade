@extends('backend.master')

@section('title')
    Manage product
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
                            <h1 class="page-title">Product Table</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
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
                                        <h3 class="card-title">Manage Product</h3>
                                    </div>
                                    <div>
                                        <h5 class="mt-3 text-center text-success">{{ Session::get('message') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="editable-responsive-table"
                                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Product Name</th>
                                                        {{-- <th>Brand</th> --}}
                                                        <th>Regular price</th>
                                                        <th>product Image</th>
                                                        <th>Featured Status</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                        <tr data-id="{{$product->id}}">
                                                            <td data-field="sl">{{$loop->iteration}}</td>

                                                            {{-- this names comming from different table  --}}
                                                            {{-- <td data-field="category">{{$product->category->name}}</td>
                                                            <td data-field="sub_category">{{$product->subCategory->name}}</td>
                                                            <td data-field="brand">{{$product->brand->name}}</td>
                                                            <td data-field="unit">{{$product->unit->name}}</td> --}}

                                                            <td data-field="name">{{$product->name}}</td>
                                                            {{-- <td data-field="brand">{{$product->brand->name}} --}}
                                                            <td data-field="regular_price">{{$product->regular_price}}</td>
                                                            <td data-field="image">
                                                                <img src="{{$product->image}}" height="50px" width="50px" alt="">
                                                            </td>
                                                            <td data-field="featured_status">
                                                                <b><span class="{{$product->featured_status == 1 ? 'text-secondary' : 'text-info'}}">{{ $product->featured_status == 1 ? 'New arrival' : 'Explore' }}</span></b>
                                                            </td>
                                                            <td data-field="status">
                                                                <b><span class="{{$product->status == 1 ? 'text-green' : 'text-red'}}">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</span></b>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="{{route('product.show', $product->id)}}"
                                                                        class="btn btn-purple fs-14 text-white"
                                                                        title="Show">
                                                                        <i class="fe fe-eye"></i>
                                                                    </a>&nbsp;&nbsp;
                                                                    <a href="{{route('product.updateFeaturedStatus', $product->id)}}"
                                                                        class="btn {{$product->featured_status == 1 ? 'btn-secondary' : 'btn-info'}} fs-14 text-white"
                                                                        title="Show">
                                                                        <i class="fe {{$product->featured_status == 1 ? 'fe-sunrise' : 'fe-layers'}}"></i>
                                                                    </a>&nbsp;&nbsp;
                                                                    <a href="{{route('product.edit', $product->id)}}"
                                                                        class="btn btn-primary fs-14 text-white edit-icn"
                                                                        title="Edit">
                                                                        <i class="fe fe-edit"></i>
                                                                    </a>
                                                                    &nbsp;&nbsp;
                                                                    <form action="{{route('product.destroy', $product->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger fs-14 text-white delete-icn"
                                                                            onclick="return confirm('Delete {{ $product->name }} product?')">
                                                                            <i class="fe fe-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
