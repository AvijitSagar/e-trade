@extends('backend.master')

@section('title')
    Courier
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
                            <h1 class="page-title">Edit Courier</h1>
                        </div>

                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Courier</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Edit Courier</h3>
                            </div>
                            <div>
                                <h5 class="mt-3 text-center text-success">{{ Session::get('message') }}</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('courier.update', ['courier' => $courier->id])}}" method="POST" novalidate>
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="courier_name">Courier Name</label>
                                            <input type="text" name="courier_name" class="form-control" id="courier_name" value="{{$courier->courier_name}}">
                                            <p class="text-danger pt-2"> {{ $errors->has('courier_name') ? $errors->first('courier_name') : '' }}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="courier_email">Courier Email</label>
                                            <input type="email" name="courier_email" class="form-control" id="courier_email" value="{{$courier->courier_email}}">
                                            <p class="text-danger pt-2"> {{ $errors->has('courier_email') ? $errors->first('courier_email') : '' }}</p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="courier_mobile">Courier Mobile</label>
                                            <input type="number" name="courier_mobile" class="form-control" id="courier_mobile" value="{{$courier->courier_mobile}}">
                                            <p class="text-danger pt-2"> {{ $errors->has('courier_mobile') ? $errors->first('courier_mobile') : '' }}
                                            </p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="courier_cost">Courier Cost</label>
                                            <input type="number" name="courier_cost" class="form-control" id="courier_cost" value="{{$courier->courier_cost}}">
                                            <p class="text-danger pt-2"> {{ $errors->has('courier_cost') ? $errors->first('courier_cost') : '' }}</p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="courier_address">Courier Address</label>
                                            <textarea class="form-control" name="courier_address" id="courier_address" cols="10" rows="3">{{$courier->courier_address}}</textarea>
                                            <p class="text-danger pt-2">{{ $errors->has('courier_address') ? $errors->first('courier_address') : '' }}</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Courier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
