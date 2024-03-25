@extends('backend.master')

@section('title')
    Edit order
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
                            <h1 class="page-title">Order</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
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
                                        <h3 class="card-title">Order Edit Form</h3>
                                    </div>
                                    <div>
                                        <h5 class="mt-3 text-center text-success">{{ Session::get('message') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('admin.order-update', ['id' => $order->id]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label class="col-md-3">Order Total</label>
                                                <div class="col-md-9">
                                                    <input type="text" value="{{ $order->order_total }}" readonly
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3">Customer Info</label>
                                                <div class="col-md-9">
                                                    <input type="text" value="{{ $order->customer->name }}" readonly
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3">Order Status</label>
                                                <div class="col-md-9">
                                                    <select name="order_status" id="" class="form-control">
                                                        <option value="">--Select Order Status--</option>
                                                        <option value="0" @selected($order->order_status == 0)>Pending</option>
                                                        <option value="1" @selected($order->order_status == 1)>Complete
                                                        </option>
                                                        <option value="2" @selected($order->order_status == 2)>Processing
                                                        </option>
                                                        <option value="3" @selected($order->order_status == 3)>Cancel</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3">Courier Info</label>
                                                <div class="col-md-9">
                                                    <select name="courier_id" id="" class="form-control">
                                                        <option value="">--Select Courier Info--</option>
                                                        @foreach ($couriers as $courier)
                                                            <option value="{{ $courier->id }}"{{ $order->courier_id == $courier->id ? 'selected' : ''}}>
                                                                {{ $courier->courier_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3">Delevery Address</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="delivery_address" id="">{{ $order->delivery_address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3"></label>
                                                <div class="col-md-9">
                                                    <input type="submit" class="btn btn-success"
                                                        value="Update Order Status">
                                                </div>
                                            </div>
                                        </form>
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
