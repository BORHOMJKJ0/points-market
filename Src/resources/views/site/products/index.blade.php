@extends('site.layouts.index')


@section('content')


<section class="product-shop spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <div class="product-list">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-3 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ $product->uploads("main_image") }}" alt="">
                                    @if ($product->current_offer)
                                    <div class="sale pp-sale">
                                        @lang("labels.sale")
                                    </div>
                                    @endif

                                    <ul>
                                        <li class="w-icon active"><a href="#" class="add-to-cart" data-product="{{$product}}"><i class="icon_bag_alt"></i></a></li>
                                        <li class="w-icon"><a href="{{ $product->slugged_url() }}"><i class="fa fa-eye"></i></a></li>

                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <a href="{{ $product->slugged_url() }}">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                    <div class="product-price" style="direction: rtl">
                                        @if ($product->current_offer)
                                        {{ number_format($product->offer_price(),1) }} @lang("labels.ryal")
                                        <span>{{ number_format($product->price,1) }} @lang("labels.ryal")</span>
                                        @else
                                        {{ number_format($product->price,1) }} @lang("labels.ryal")

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>


                </div>

            </div>
        </div>
    </div>
</section>


@endsection