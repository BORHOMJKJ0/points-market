@extends('site.layouts.index')


@section('content')

<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="{{$product->uploads("main_image")}}" alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active" data-imgbigurl="{{$product->uploads("main_image")}}"><img src="{{$product->uploads("main_image")}}" alt=""></div>

                                @foreach ($product->images as $image)
                                <div class="pt" data-imgbigurl="{{ $image->uploads("path") }}"><img src="{{ $image->uploads("path") }}" alt=""></div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <h3>{{$product->name}}</h3>
                            </div>

                            <div class="pd-desc">
                                <p> {!! $product->description !!}</p>

                                @if ($product->current_offer)
                                <h4>{{ number_format($product->offer_price(),1) }} @lang("labels.ryal") <span>{{ number_format($product->price,1) }} @lang("labels.ryal")</span></h4>
                                @else
                                <h4>
                                    {{ number_format($product->price,1) }} @lang("labels.ryal")
                                </h4>
                                @endif
                            </div>

                            <div class="quantity">
                                <a href="#" class="primary-btn pd-cart add-to-cart" data-product="{{ $product }}">@lang("labels.add_to_cart")</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection