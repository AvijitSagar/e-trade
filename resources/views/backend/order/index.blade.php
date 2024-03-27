@extends('backend.master')

@section('title')
    Manage order
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
                                <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
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
                                        <h3 class="card-title">Manage Order</h3>
                                    </div>
                                    <div>
                                        <h5 class="mt-3 text-center text-success">{{ Session::get('message') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="editable-responsive-table"
                                                class="table table-hover editable-table table-nowrap table-bordered table-edit wp-100">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Order Id</th>
                                                        <th>Customer Info</th>
                                                        <th>Order Date</th>
                                                        <th>Order Total</th>
                                                        <th>Order Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr data-id="{{ $order->id }}">
                                                            <td data-field="id">{{ $loop->iteration }}</td>
                                                            <td data-field="order_id">{{ $order->id }}</td>
                                                            <td data-field="customer_id">
                                                                {{ $order->customer->name . '(' . $order->customer->mobile . ')' }}
                                                            </td>
                                                            <td data-field="order_date">{{ $order->order_date }}</td>
                                                            <td data-field="order_total">{{ $order->order_total }} &#2547;
                                                            </td>
                                                            <td data-field="order_status"
                                                                @if ($order->order_status == 0) class="text-black" 
                                                                @elseif($order->order_status == 1) 
                                                                    class="text-success" 
                                                                @elseif($order->order_status == 2) 
                                                                    class="text-warning" 
                                                                @elseif($order->order_status == 3) 
                                                                    class="text-danger" @endif>
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
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="{{ route('admin.order-detail', ['id' => $order->id]) }}"
                                                                        class="btn btn-info text-white"
                                                                        title="Oredr Detail">
                                                                        <i class="fe fe-book-open"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.order-edit', ['id' => $order->id]) }}"
                                                                        class="btn btn-primary ms-1 text-white {{ $order->order_status == 1 ? 'disabled' : '' }}"
                                                                        title="Order Edit">
                                                                        <i class="fe fe-edit"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.order-invoice', ['id' => $order->id]) }}"
                                                                        class="btn btn-success ms-1 text-white {{ $order->order_status == 3 ? 'disabled' : '' }}"
                                                                        title="Order Invoice">
                                                                        <i class="fe fe-dollar-sign"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.download-invoice', ['id' => $order->id]) }}"
                                                                        target="_blank"
                                                                        class="btn btn-warning ms-1 text-white {{ $order->order_status == 3 ? 'disabled' : '' }}"
                                                                        title="Download Invoice">
                                                                        <i class="fe fe-download"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.order-delete', ['id' => $order->id]) }}"
                                                                        class="btn btn-danger ms-1 text-white {{ $order->order_status == 3 ? '' : 'disabled' }}"
                                                                        title="Delete Order">
                                                                        <i class="fe fe-trash"></i>
                                                                    </a>
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
