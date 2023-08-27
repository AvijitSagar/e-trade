@extends('backend.master')

@section('title')
    Unit
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
                            <h1 class="page-title">Add Unit</h1>
                        </div>
                        
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Unit</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Add Unit</h3>
                            </div>
                            <div>
                                <h5 class="mt-3 text-center text-success">{{Session::get('message')}}</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('unit.store')}}" method="POST" novalidate>
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="unit_name">Unit Name</label>
                                            <input type="text" name="name" class="form-control" id="unit_name" placeholder="" required>
                                            <p class="text-danger pt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="unit_desc">Unit Description</label>
                                            <textarea type="text" name="description" class="form-control" id="unit_desc" cols="30" rows="10" placeholder=""></textarea>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Add Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection