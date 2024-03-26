@extends('backend.master')

@section('title')
    Order invoice
@endsection

<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }

    /* my design  */
    .my-txt-align-r {
        text-align: right;
    }

    .my-txt-align-c {
        text-align: center;
    }
</style>

@section('content')
    <section>
        <div class="app-content main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">


                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Order</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order Invoice</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="invoice-box mb-5 mt-5">
                                    <table cellpadding="0" cellspacing="0">
                                        <tr class="top">
                                            <td colspan="5">
                                                <table>
                                                    <tr>
                                                        <td class="title">
                                                            <img src="{{ asset('/') }}frontend/assets/images/logo/logo-large.png"
                                                                style="width: 100%; max-width: 300px" />
                                                        </td>
                                                        <td>
                                                            Invoice #: 00{{ $order->id }}<br />
                                                            Order Date: {{ $order->order_date }}<br />
                                                            Delivery Date: {{ date('Y-m-d') }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="information">
                                            <td colspan="5">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <h4><u>Delivery Address</u></h4>
                                                            {{ $order->customer->name }}<br />
                                                            {{ $order->customer->email }}<br />
                                                            {{ $order->customer->mobile }}<br />
                                                            {{ $order->delivery_address }}
                                                        </td>
                                                        <td>
                                                            <h4><u>Company Information</u></h4>
                                                            Acme Corp. asfsa asfsd ff sf<br />
                                                            John Doe afasfdsf af dsf f<br />
                                                            john@example.com
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <td colspan="4">Payment Method</td>
                                            <td>Check #</td>
                                        </tr>
                                        <tr class="details">
                                            <td colspan="4">{{ $order->payment_type }}</td>
                                            <td>{{ $order->order_total }} &#2547;</td>
                                        </tr>
                                        <tr class="heading">
                                            <td>SL</td>
                                            <td class="my-txt-align-c">Item</td>
                                            <td class="my-txt-align-c">Unit Price</td>
                                            <td class="my-txt-align-c">Quantity</td>
                                            <td class="my-txt-align-r">Total Price</td>
                                        </tr>

                                        @php($sum = 0)
                                        @foreach ($order->orderDetail as $item)
                                            <tr class="item">
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="my-txt-align-c">{{ $item->product_name }}</td>
                                                <td class="my-txt-align-c">{{ $item->product_price }} &#2547;</td>
                                                <td class="my-txt-align-c">{{ $item->product_quantity }}</td>
                                                <td class="my-txt-align-r">
                                                    {{ $item->product_quantity * $item->product_price }} &#2547;</td>
                                            </tr>
                                            @php($sum = $sum + $item->product_quantity * $item->product_price)
                                        @endforeach

                                        <tr class="total">
                                            <td colspan="4"></td>
                                            <td>Item Total: {{ $sum }} &#2547;</td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="4"></td>
                                            <td>Tax: {{ $order->tax_total }} &#2547;</td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="4"></td>
                                            <td>Shipping cost: {{ $order->shipping_total }} &#2547;</td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="4"></td>
                                            <td>Total Payable: {{ $order->order_total }} &#2547;</td>
                                        </tr>
                                    </table>
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
