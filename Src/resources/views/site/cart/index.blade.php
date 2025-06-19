@extends('site.layouts.index')


@section('content')
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                {!! alert("success",session("success")) !!}
                {!! alert("danger",session("error")) !!}
                {!! alert("info",session("info")) !!}
                {!! validationErrors() !!}

                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>@lang("validation.attributes.main_image")</th>
                                <th class="p-name">@lang("validation.attributes.name")</th>
                                <th>@lang("validation.attributes.price")</th>
                                <th>@lang("validation.attributes.quantity")</th>
                                <th>@lang("labels.total")</th>
                                <th><i class="ti-close"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::get() as $product_in_cart)
                            <tr>
                                <td class="cart-pic first-row"><img src="{{ $product_in_cart->uploads("main_image") }}" alt="" width="50%"></td>
                                <td class="cart-title first-row">
                                    <h5>{{ $product_in_cart->name  }}</h5>
                                </td>
                                <td class="p-price first-row">{{ number_format($product_in_cart->offer_price(),1) }} @lang("labels.ryal")</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input min="1" form="update-cart-form" type="number" value="{{ $product_in_cart->cart_quantity }}" name="quantity[{{ $product_in_cart->id }}]">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">{{ number_format($product_in_cart->offer_price() * $product_in_cart->cart_quantity,1) }} @lang("labels.ryal")</td>
                                <td class="close-td first-row remove-from-cart">
                                    <form method="POST" action="{{ route("site.cart.destroy",["product" => $product_in_cart->id]) }}" onclick="$(this).submit();">
                                        @csrf
                                        @method("DELETE")
                                        <i class="ti-close"></i>
                                </td>

                                </form>
                                </a>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <form action="{{ route('site.cart.update') }}" method="POST" id="update-cart-form">
                                @csrf
                                @method("PATCH")
                                <button type="submit" class="primary-btn up-cart">@lang("labels.edit")</button>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="cart-total">@lang("labels.total") <span>{{ number_format(Cart::total_price(),1) }} @lang("labels.ryal")</span></li>
                            </ul>
                            <a href="{{ route("site.checkout.index") }}" class="proceed-btn">@lang("pages.checkout")</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
