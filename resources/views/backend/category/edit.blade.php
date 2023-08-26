@extends('backend.master')

@section('title')
    Category
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
                            <h1 class="page-title">Edit Category</h1>
                        </div>
                        
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <div>
                                <h5 class="mt-3 text-center text-success">{{Session::get('message')}}</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('category.update', $category->id)}}" method="POST" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="category_name">Category Name</label>
                                            <input type="text" name="name" value="{{$category->name}}" class="form-control" id="category_name" placeholder="Add category name">
                                            <p class="text-danger pt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="category_status">Status</label>
                                            <select name="status" class="form-control" id="category_statuscategory_status">
                                                <option value="1" {{$category->status == 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{$category->status == 0 ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection