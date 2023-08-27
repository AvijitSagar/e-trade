@extends('backend.master')

@section('title')
    Edit Unit
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
                            <h1 class="page-title">Edit Unit</h1>
                        </div>
                        
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Unit</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Edit Unit</h3>
                            </div>
                            <div>
                                <h5 class="mt-3 text-center text-success">{{Session::get('message')}}</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" action="{{route('unit.update', $unit->id)}}" method="POST" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="unit_name">Unit Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$unit->name}}" id="unit_name" placeholder="Add Unit name" required>
                                            <p class="text-danger pt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="validationCustom011">Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="1" {{$unit->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$unit->status == 0 ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                            <label for="validationCustom011">Unit Description</label>
                                            <textarea type="text" name="description" class="form-control" id="validationCustom011" cols="30" rows="10" placeholder="Add Unit description">{{$unit->description}}</textarea>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Unit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection