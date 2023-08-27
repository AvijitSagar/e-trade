@extends('backend.master')

@section('title')
    Brand
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
                            <h1 class="page-title">Add Brand</h1>
                        </div>
                        
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Add Brand</h3>
                            </div>
                            <div>
                                <h5 class="mt-3 text-center text-success">{{Session::get('message')}}</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('brand.store')}}" method="POST" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="brand_name">Brand name</label>
                                            <input type="text" name="name" class="form-control" id="brand_name" placeholder="" required>
                                            <p class="text-danger pt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="brand_image">Brand image</label>
                                            <input type="file" name="image" accept="image/*" class="form-control" id="brand_image" placeholder="" required>
                                            <p class="text-danger pt-2">{{$errors->has('image') ? $errors->first('image') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="validationCustom011">Brand description</label>
                                            <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Add Brand</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection