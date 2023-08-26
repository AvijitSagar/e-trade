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
                            <h1 class="page-title">Category Table</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
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
                                        <h3 class="card-title">Manage Category</h3>
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
                                                        <th>Subcategory</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subCategories as $subCategory)
                                                        <tr data-id="{{ $subCategory->id }}">
                                                            <td data-field="sl">{{ $loop->iteration }}</td>
                                                            <td data-field="name">{{ $subCategory->name }}</td>
                                                            <td data-field="category">{{ $subCategory->category->name }}</td>
                                                            <td data-field="status">
                                                                <b><span class="{{$subCategory->status == 1 ? 'text-green' : 'text-red'}}">{{ $subCategory->status == 1 ? 'Active' : 'Inactive' }}</span></b>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="{{ route('sub-category.edit', $subCategory->id) }}"
                                                                        class="btn btn-primary fs-14 text-white edit-icn"
                                                                        title="Edit">
                                                                        <i class="fe fe-edit"></i>
                                                                    </a>
                                                                    &nbsp;&nbsp;
                                                                    <form action="{{route('sub-category.destroy', $subCategory->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('GET')
                                                                        <button type="submit"
                                                                            class="btn btn-danger fs-14 text-white delete-icn"
                                                                            onclick="return confirm('Delete {{$subCategory->name}} sub-category?')">
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
