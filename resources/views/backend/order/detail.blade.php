@extends('backend.master')

@section('title')
    Manage category
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
                            <h1 class="page-title">Order Table</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header border bottom">
                                    <h3 class="card-title">Order Basic Information</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th>Order Id</th>
                                            <td>{{ $order->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Date</th>
                                            <td>{{ $order->order_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Total</th>
                                            <td>{{ $order->order_total }} &#2547;</td>
                                        </tr>
                                        <tr>
                                            <th>Tax Total</th>
                                            <td>{{ $order->tax_total }} &#2547;</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Amount</th>
                                            <td>{{ $order->shipping_total }} &#2547;</td>
                                        </tr>
                                        <tr>
                                            <th>Order Status</th>
                                            <td
                                                @if ($order->order_status == 0) class="text-black" 
                                                @elseif($order->order_status == 1) 
                                                    class="text-success" 
                                                @elseif($order->order_status == 2) 
                                                    class="text-warning" 
                                                @elseif($order->order_status == 3) 
                                                    class="text-danger" 
                                                @endif
                                            >
                                                @if ($order->order_status == 0)
                                                    <b>Pending</b>
                                                @elseif ($order->order_status == 1)
                                                    <b>Complete</b>
                                                @elseif ($order->order_status == 2)
                                                    <b>Processing</b>
                                                @elseif ($order->order_status == 3)
                                                    <b>Cancel</b>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Customer Info</th>
                                            <td>{{ $order->customer->name . ' (' . $order->customer->mobile . ')' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Address</th>
                                            <td>{{ $order->delivery_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Status</th>
                                            <td
                                                @if ($order->delivery_status == 0) class="text-black" 
                                                @elseif($order->delivery_status == 1) 
                                                    class="text-success" 
                                                @elseif($order->delivery_status == 2) 
                                                    class="text-warning" 
                                                @elseif($order->delivery_status == 3) 
                                                    class="text-danger" 
                                                @endif
                                            >
                                                @if ($order->delivery_status == 0)
                                                    <b>Pending</b>
                                                @elseif ($order->delivery_status == 1)
                                                    <b>Complete</b>
                                                @elseif ($order->delivery_status == 2)
                                                    <b>Processing</b>
                                                @elseif ($order->delivery_status == 3)
                                                    <b>Cancel</b>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Type</th>
                                            <td>{{ $order->payment_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Status</th>
                                            <td
                                                @if ($order->payment_status == 0) class="text-black" 
                                                @elseif($order->payment_status == 1) 
                                                    class="text-success" 
                                                @elseif($order->payment_status == 2) 
                                                    class="text-warning" 
                                                @elseif($order->payment_status == 3) 
                                                    class="text-danger" 
                                                @endif
                                            >
                                                @if ($order->payment_status == 0)
                                                    <b>Pending</b>
                                                @elseif ($order->payment_status == 1)
                                                    <b>Complete</b>
                                                @elseif ($order->payment_status == 2)
                                                    <b>Processing</b>
                                                @elseif ($order->payment_status == 3)
                                                    <b>Cancel</b>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Transaction Id</th>
                                            <td>{{ $order->transaction_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Currency</th>
                                            <td>{{ $order->currency }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h3 class="card-title">Order Product Information</h3>
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
                                                        <th>Name</th>
                                                        <th>Image</th>
                                                        <th>Price</th>
                                                        <th>Qunatity</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order->orderDetail as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->product_name }}</td>
                                                            <td>
                                                                <img src="{{ asset($item->product_image) }}" height="50px"
                                                                    width="50px" alt="product image">
                                                            </td>
                                                            <td>{{ $item->product_price }} &#2547;</td>
                                                            <td>{{ $item->product_quantity }}</td>
                                                            <td>{{ $item->product_quantity * $item->product_price }}
                                                                &#2547;
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
