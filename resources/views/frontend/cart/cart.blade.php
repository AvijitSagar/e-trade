@extends('frontend.master')

@section('title')
    Cart
@endsection

@section('content')
    <section>
        <main class="main-wrapper">

            <!-- Start Cart Area  -->
            <div class="axil-product-cart-area axil-section-gap">
                <div class="container">
                    <div class="axil-product-cart-wrap">
                        <div class="product-table-heading">
                            <h4 class="title">Your Cart</h4>
                            {{-- <p class="text-success text">{{session('message')}}</p> --}}
                            @if (session('message'))
                                <div class="col-md-8 mx-auto text-center">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ session('message') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <a href="#" class="cart-clear">Clear Shoping Cart</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table axil-product-table axil-cart-table mb--40">
                                <thead>
                                    <tr>
                                        <th scope="col" class="product-remove"></th>
                                        <th scope="col" class="product-thumbnail">Product</th>
                                        <th scope="col" class="product-title"></th>
                                        <th scope="col" class="product-category">Category</th>
                                        <th scope="col" class="product-brand">Brand</th>
                                        <th scope="col" class="product-price">Price</th>
                                        <th scope="col" class="product-quantity">Quantity</th>
                                        <th scope="col" class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- showing cart item --}}
                                    @php($sum = 0)
                                    @foreach ($cartProducts as $cartProduct)
                                        <tr>
                                            <td class="product-remove">
                                                <a href="{{ route('cart.delete', $cartProduct->rowId) }}" class="remove-wishlist" onclick="return confirm('Delete {{ $cartProduct->name }} from cart?')">
                                                    <i class="fal fa-times"></i>
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="{{ route('details.product', $cartProduct->id) }}">
                                                    <img src="{{ asset($cartProduct->options->image) }}"
                                                        alt="Product Image">
                                                </a>
                                            </td>
                                            <td class="product-title">
                                                <a
                                                    href="{{ route('details.product', $cartProduct->id) }}">{{ $cartProduct->name }}</a>
                                            </td>
                                            <td class="product-title">
                                                <a href="single-product.html">{{ $cartProduct->options->category }}</a>
                                            </td>
                                            <td class="product-title">
                                                <a href="single-product.html">{{ $cartProduct->options->brand }}</a>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span class="currency-symbol">&#2547;</span>{{ $cartProduct->price }}
                                            </td>
                                            <td class="product-quantity" data-title="Qty">
                                                <form action="{{ route('cart.update', $cartProduct->rowId) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="pro-qty">
                                                        <input type="number" name="qty" min="1"
                                                            class="quantity-input" value="{{ $cartProduct->qty }}">
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $cartProduct->id }}">
                                                    <button type="submit" class="btn btn-lg btn-success">Update</button>
                                                </form>
                                            </td>
                                            <td class="product-subtotal" data-title="Subtotal">
                                                <span
                                                    class="currency-symbol">&#2547;</span>{{ $cartProduct->price * $cartProduct->qty }}
                                            </td>
                                        </tr>
                                        @php($sum = $sum + $cartProduct->price * $cartProduct->qty)
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-update-btn-area">
                            <div class="input-group product-cupon">
                                <input placeholder="Enter coupon code" type="text">
                                <div class="product-cupon-btn">
                                    <button type="submit" class="axil-btn btn-outline">Apply</button>
                                </div>
                            </div>
                            <div class="update-btn">
                                <a href="#" class="axil-btn btn-outline">Update Cart</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                                <div class="axil-order-summery mt--80">
                                    <h5 class="title mb--20">Order Summary</h5>
                                    <div class="summery-table-wrap">
                                        <table class="table summery-table mb--30">
                                            <tbody>
                                                <tr class="order-subtotal">
                                                    <td>Subtotal</td>
                                                    <td>&#2547; {{ number_format($sum) }}</td>
                                                </tr>
                                                <tr class="order-shipping">
                                                    <td>Shipping</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="radio" id="radio1" name="shipping">
                                                            <label for="radio1">Free Shippping</label>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="radio" id="radio2" name="shipping" checked>
                                                            <label for="radio2">Local:
                                                                &#2547;{{ $shipping = 120 }}</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="order-tax">
                                                    @php($tax = $sum * 0.07)
                                                    <td>Tax 7%</td>
                                                    <td>&#2547; {{ $tax }}</td>
                                                </tr>
                                                <tr class="order-total">
                                                    @php($total = $sum + $shipping + $tax)
                                                    <td>Total</td>
                                                    <td class="order-total-amount"> &#2547;
                                                        {{ number_format(round($total)) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="{{ route('checkout') }}"
                                        class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cart Area  -->

        </main>
    </section>
@endsection
