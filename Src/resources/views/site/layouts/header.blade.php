<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang("labels.ramq") - {{ $page_title}}</title>

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/assets/site/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/site/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/site/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/site/css/elegant-icons.css">
    <link rel="stylesheet" href="/assets/site/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/site/css/nice-select.css">
    <link rel="stylesheet" href="/assets/site/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/site/css/slicknav.min.css">
    <link rel="stylesheet" href="/assets/site/css/toast.css">
    <link rel="stylesheet" href="/assets/site/css/style.css">

    <link rel="shortcut icon" href="/assets/images/favicon.png" />

</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    @if (setting("contact","email"))
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        <a href="mailto:{{ setting("contact","email") }}">
                            {{setting("contact","email")}}
                        </a>
                    </div>
                    @endif
                    @if (setting("contact","phone"))
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        <a href="tel:{{setting("contact","phone")}}">
                            {{setting("contact","phone")}}
                        </a>
                    </div>
                    @endif
                </div>
                <div class="ht-right">

                    @if (user())
                    <a href="{{ route("site.profile.index") }}" class="login-panel"><i class="fa fa-user"></i>{{ user()->name }}</a>
                    <form method="POST" action="{{ route("site.logout") }}" class="login-panel" onclick="$(this).submit()">@csrf <i class="fa fa-user"></i>@lang("labels.logout")</form>
                    @else
                    <a href="{{ route("site.register") }}" class="login-panel"><i class="fa fa-user"></i>@lang("labels.signup")</a>
                    <a href="{{ route("site.login") }}" class="login-panel"><i class="fa fa-user"></i>@lang("labels.login")</a>
                    @endif




                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{route("site.home")}}">
                                <img src="/assets/images/favicon.png" alt="" width="75">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 text-right col-md-3 ml-auto">
                        <ul class="nav-right">


                            <li class="cart-icon">
                                <a href="{{ url("cart") }}">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{ Cart::total_quantity() }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody class="header-cart">
                                                @foreach (Cart::get() as $product_in_cart)
                                                @include("site.cart.header_item",compact("product_in_cart"))
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="select-button">
                                        <a href="{{ route('site.cart.index') }}" class="primary-btn view-card">@lang("pages.cart")</a>
                                        <a href="{{ route('site.checkout.index') }}" class="primary-btn checkout-btn">@lang("pages.checkout")</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">

                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ current_page("/") }}"><a href="{{route("site.home")}}">@lang("pages.home")</a></li>
                        <li><a href="#">@lang("pages.sections")</a>
                            <ul class="dropdown">
                                <li class="{{ current_page("products") }}"><a href="{{ route("site.products.index") }}">@lang("labels.all")</a></li>

                                @foreach ($header_sections as $header_section)
                                <li class="{{ current_page("sections/".$header_section->slug()) }}"><a href="{{ $header_section->slugged_url() }}">{{$header_section->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ current_page("contact") }}"><a href="{{route("site.contact.index")}}">@lang("pages.contact")</a></li>

                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->