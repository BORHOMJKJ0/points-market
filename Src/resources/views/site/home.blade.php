@extends('site.layouts.index')


@section('content')
<section class="hero-section">
    <div class="hero-items owl-carousel">
        @foreach ($sliders as $slider)
        <div @if($slider->link) onclick="location.href = '{{ $slider->link  }}'" @endif class="single-hero-items set-bg" data-setbg="{{ $slider->uploads("image") }}"></div>
        @endforeach
    </div>
</section>

<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>@lang("labels.about")</h2>
                    </div>

                    <div>
                        {!! setting("general","about") !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-list">
                    <h2 class="text-center mb-3">@lang("labels.latest_products")</h2>

                    <div class="row">
                        @foreach ($latest_products as $latest_product)
                        <div class="col-lg-3 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ $latest_product->uploads("main_image") }}" alt="">
                                    @if ($latest_product->current_offer)
                                    <div class="sale pp-sale">
                                        @lang("labels.sale")
                                    </div>
                                    @endif

                                    <ul>
                                        <li class="w-icon active"><a href="#" class="add-to-cart" data-product="{{$latest_product}}"><i class="icon_bag_alt"></i></a></li>
                                        <li class="w-icon"><a href="{{ $latest_product->slugged_url() }}"><i class="fa fa-eye"></i></a></li>

                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <a href="{{ $latest_product->slugged_url() }}">
                                        <h5>{{ $latest_product->name }}</h5>
                                    </a>
                                    <div class="product-price" style="direction: rtl">
                                        @if ($latest_product->current_offer)
                                        {{ number_format($latest_product->offer_price(),1) }} @lang("labels.ryal")
                                        <span>{{ number_format($latest_product->price,1) }} @lang("labels.ryal")</span>
                                        @else
                                        {{ number_format($latest_product->price,1) }} @lang("labels.ryal")

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