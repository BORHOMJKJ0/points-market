@extends('site.layouts.index')


@section('content')

<section class="checkout-section spad">
    <div class="container">
        <form method="POST" action="{{ route("site.checkout.complete") }}" class="checkout-form">
            @csrf
            <div class="row">

                <div class="col-12">

                    {!! alert("success",session("success")) !!}
                    {!! alert("danger",session("error")) !!}
                    {!! alert("info",session("info")) !!}
                    {!! validationErrors() !!}
                </div>
                @if (!user())
                <div class="col-12">
                    {!! alert("info",__("messages.info.checkout.you_must_log_in")) !!}
                </div>
                @endif

                @if (Cart::empty())
                <div class="col-12">
                    {!! alert("info",__("messages.info.checkout.no_items_in_cart_to_checkout")) !!}
                </div>
                @endif



                @if (user() && !Cart::empty())

                <div class="col-lg-6">

                    <div class="place-order">
                        <h4>@lang("labels.your_order")</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li> @lang("labels.product") <span>@lang("labels.price")</span></li>
                                @foreach (Cart::get() as $product_in_cart)
                                <li class="fw-normal">{{$product_in_cart->name}} x {{$product_in_cart->cart_quantity}} <span>{{ number_format($product_in_cart->offer_price() * $product_in_cart->cart_quantity,1) }} @lang("labels.ryal")</span></li>
                                @endforeach
                                <li class="total-price">@lang("labels.total") <span> {{number_format(Cart::total_price(),1)}}@lang("labels.ryal")</span></li>
                            </ul>

                            <div class="checkout-content">
                                <input name="coupon" placeholder="@lang('validation.attributes.coupon')" value="{{ old("coupon") }}">
                            </div>

                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">@lang("labels.save_order")</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif



            </div>
        </form>
    </div>
</section>
@endsection