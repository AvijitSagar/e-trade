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
                            <h1 class="page-title">Edit Sub-category</h1>
                        </div>
                        
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub-category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Sub-category</li>
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
                                <form class="needs-validation" action="{{route('sub-category.update', $subCategory->id)}}" method="POST" novalidate>
                                    @csrf
                                    @method('POST')
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="validationCustom011">Select Category</label>
                                            <select name="category_id" required class="form-control" id="">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id == $subCategory->category_id ? 'selected' : ''}}>{{$category->name}}</option> 
                                                @endforeach
                                            </select>
                                            <p class="text-danger pt-2">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="validationCustom011">Sub-category name</label>
                                            <input type="text" name="name" value="{{$subCategory->name}}" class="form-control" id="validationCustom011" placeholder="Add sub-category name" required>
                                            <p class="text-danger pt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="validationCustom011">Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="1" {{$subCategory->status == 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{$subCategory->status == 0 ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Sub-Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection