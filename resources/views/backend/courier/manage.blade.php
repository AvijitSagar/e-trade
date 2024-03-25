@extends('backend.master')

@section('title')
    Manage courier
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
                            <h1 class="page-title">Courier Table</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Courier</li>
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
                                        <h3 class="card-title">Manage Courier</h3>
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
                                                        <th>Courier Name</th>
                                                        <th>Courier Email</th>
                                                        <th>Courier Mobile</th>
                                                        <th>Courier Cost</th>
                                                        <th>Courier Address</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($couriers as $courier)
                                                        <tr data-id="{{$courier->id}}">
                                                            <td data-field="id">{{$loop->iteration}}</td>
                                                            <td data-field="courier_name">{{$courier->courier_name}}</td>
                                                            <td data-field="courier_email">{{$courier->courier_email}}</td>
                                                            <td data-field="courier_mobile">{{$courier->courier_mobile}}</td>
                                                            <td data-field="courier_cost">{{$courier->courier_cost}} &#2547;</td>
                                                            <td data-field="courier_address">{{$courier->courier_address}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="{{route('courier.edit', ['courier' => $courier->id])}}" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                                                        <i class="fe fe-edit"></i>
                                                                    </a>
                                                                    &nbsp;&nbsp;
                                                                    <form action="{{route('courier.destroy', ['courier' => $courier->id])}}" method="POST">
                                                                        @csrf
                                                                        @method("DELETE")
                                                                        <button type="submit" class="btn btn-danger fs-14 text-white delete-icn" onclick="return confirm('Delete {{$courier->courier_name}} courier?')">
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
