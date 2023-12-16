@extends('frontend.master')

@section('title')
    Checkout
@endsection

@section('content')
    <section>
        <main class="main-wrapper">

            <!-- Start Checkout Area  -->
            <div class="axil-checkout-area axil-section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="axil-checkout-billing">
                                <h4 class="title mb--40">Billing Details</h4>


                                <div class="card">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="cash-on-delivery-tab" data-bs-toggle="tab" data-bs-target="#cash-on-delivery-tab-pane" type="button" role="tab" aria-controls="cash-on-delivery-tab-pane" aria-selected="true">Cash on delivery</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="online-payment-tab" data-bs-toggle="tab" data-bs-target="#online-payment-tab-pane" type="button" role="tab" aria-controls="profonline-paymentile-tab-pane" aria-selected="false">Online payment</button>
                                        </li>
                                    </ul>

                                    
                                        <div class="tab-content p-4" id="myTabContent">
                                            <div class="tab-pane fade show active" id="cash-on-delivery-tab-pane" role="tabpanel" aria-labelledby="cash-on-delivery-tab" tabindex="0">
                                                <form action="{{route('order.new')}}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label>Full Name <span class="danger">*</span></label>

                                                        @if (isset($customer->name))
                                                            <input type="text" value="{{ isset($customer->name) ? $customer->name : '' }}" readonly id="name" name="name" placeholder="Full name">
                                                        @else
                                                            <input type="text" value="{{ isset($customer->name) ? $customer->name : '' }}" id="name" name="name" placeholder="Full name">
                                                        @endif
                                                        
                                                        <p class="text-danger pt-2">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>

                                                        @if (isset($customer->email))
                                                            <input type="email" value="{{isset($customer->email) ? $customer->email : ''}}" readonly id="email" name="email" placeholder="Email">
                                                        @else
                                                            <input type="email" value="{{isset($customer->email) ? $customer->email : ''}}" id="email" name="email" placeholder="Email">
                                                        @endif
                                                        
                                                        <p class="text-danger pt-2">{{$errors->has('email') ? $errors->first('email') : ''}}</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Mobile <span class="danger">*</span></label>

                                                        @if (isset($customer->mobile))
                                                            <input type="number" value="{{isset($customer->mobile) ? $customer->mobile : ''}}" readonly id="mobile" name="mobile" placeholder="Mobile number">
                                                        @else
                                                            <input type="number" value="{{isset($customer->mobile) ? $customer->mobile : ''}}" id="mobile" name="mobile" placeholder="Mobile number">
                                                        @endif
                                                        
                                                        <p class="text-danger pt-2">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Delivery Address<span class="danger">*</span></label>
                                                        <textarea id="delivery_address" name="delivery_address" rows="2" placeholder="Detailed Address"></textarea>
                                                        <p class="text-danger pt-2">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</p>
                                                    </div>
                                                    <div class="mb-5 ms-2">
                                                        <input type="radio" checked name="payment_type" value="cash" id="checkbox">
                                                        <label for="checkbox">Cash on delivery</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" style="width: 100%" value="Confirm Order">
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="online-payment-tab-pane" role="tabpanel" aria-labelledby="online-payment-tab" tabindex="0">
                                                .......
                                            </div>
                                        </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Your Order</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($sum = 0)
                                            @foreach ($cartProducts as $cartProduct)
                                                <tr class="order-product">
                                                    <td>{{$cartProduct->name}} : &nbsp; <span class="quantity">{{$cartProduct->price}} x {{$cartProduct->qty}}</span></td>
                                                    <td>&#2547; {{number_format($cartProduct->price * $cartProduct->qty)}}</td>
                                                </tr>
                                                @php($sum = $sum + ($cartProduct->price * $cartProduct->qty))
                                            @endforeach
                                                <tr class="order-subtotal">
                                                    <td>Subtotal</td>
                                                    <td>&#2547;{{number_format(round($sum))}}</td>
                                                </tr>
                                                <tr class="order-tax">
                                                    @php($tax = $sum * 0.07)
                                                    <td>Tax 7%</td>
                                                    <td>&#2547; {{$tax}}</td>
                                                </tr>
                                                <tr class="order-shipping">
                                                    <td colspan="2">
                                                        <div class="shipping-amount">
                                                            <span class="title">Shipping Charge</span>
                                                            <span class="amount">&#2547; {{$shipping = 120}}</span>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="radio" id="radio1" name="shipping">
                                                            <label for="radio1">Free Shippping</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    @php($total = $sum + $shipping + $tax)
                                                    <td>Total payable amount</td>
                                                    <td class="order-total-amount">&#2547; {{number_format(round($total))}}</td>
                                                </tr>
                                            
                                        </tbody>
                                    </table>

                                    {{-- for putting the record in the session --}}
                                    <?php
                                        Session::put('order_total', $total);
                                        Session::put('tax_total', $tax);
                                        Session::put('shipping_total', $shipping);
                                    ?>

                                </div>
                                {{-- <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Checkout Area  -->

        </main>
    </section>
@endsection
