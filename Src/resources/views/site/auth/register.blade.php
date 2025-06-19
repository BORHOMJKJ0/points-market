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


                    <form action="{{ route("site.register") }}" method="POST">
                        @csrf

                        <div class="group-input">
                            <label for="username">@lang("validation.attributes.name")</label>
                            <input name="name" value="{{ old("name") }}">
                        </div>

                        <div class="group-input">
                            <label>@lang("validation.attributes.email")</label>
                            <input type="email" name="email" value="{{ old("email") }}">
                        </div>
                        <div class="group-input">
                            <label>@lang("validation.attributes.phone")</label>
                            <input name="phone" value="{{ old("phone") }}">
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
    </div>
</div>



@endsection