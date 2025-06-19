@extends('site.layouts.index')

@section('content')

<div class="spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">

                    <h2>{{ $page_title }}</h2>

                    {!! alert("success",session("success")) !!}
                    {!! alert("danger",session("error")) !!}
                    {!! alert("info",session("info")) !!}
                    {!! validationErrors() !!}


                    <form action="{{ route("site.profile.update") }}" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="group-input">
                            <label for="username">@lang("validation.attributes.name")</label>
                            <input name="name" value="{{ old("name",user()->name) }}">
                        </div>

                        <div class="group-input">
                            <label>@lang("validation.attributes.email")</label>
                            <input type="email" name="email" value="{{ old("email",user()->email) }}">
                        </div>
                        <div class="group-input">
                            <label>@lang("validation.attributes.phone")</label>
                            <input name="phone" value="{{ old("phone",user()->phone) }}">
                        </div>

                        <div class="group-input">
                            <label>@lang("validation.attributes.password")</label>
                            <input type="password" name="password">
                        </div>

                        <div class="group-input">
                            <label>@lang("validation.attributes.password_confirmation")</label>
                            <input type="password" name="password_confirmation">
                        </div>




                        <button type="submit" class="site-btn login-btn">@lang("labels.save")</button>
                    </form>

                </div>
            </div>
        </div>
        @if ($orders->isNotEmpty())
        <div class="row">
            <div class="col-12">

                <h2>@lang("labels.orders")</h2>

                <table class="display table table-striped table-bordered dt">
                    <thead>
                        <tr>
                            <th>@lang("validation.attributes.id")</th>
                            <th>@lang("validation.attributes.created_at")</th>
                            <th>@lang("validation.attributes.state")</th>
                            <th>@lang("validation.attributes.total_price")</th>
                            <th>@lang("labels.coupon")</th>
                            <th>@lang("labels.coupon_discount")</th>
                            <th>@lang("labels.final_total")</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format("Y-m-d") }}</td>
                            <td>{!! $order->state_label() !!} </td>
                            <td>{{ $order->total_price }} @lang("labels.ryal")</td>
                            <td>{{ $order->coupon->code ?? __("labels.not_exists") }} </td>
                            <td>{{ $order->coupon_discount ?? 0 }} @lang("labels.ryal")</td>
                            <td>{{ ($order->total_price > $order->coupon_discount) ? ($order->total_price - $order->coupon_discount) : 0 }} @lang("labels.ryal")</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>
</div>



@endsection