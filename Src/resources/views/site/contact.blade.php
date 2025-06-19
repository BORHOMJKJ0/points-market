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


                    <form action="{{ route("site.contact.store") }}" method="POST">
                        @csrf

                        <div class="group-input">
                            <label for="username">@lang("validation.attributes.name")</label>
                            <input name="name" value="{{ old("name",user()->name ?? '') }}">
                        </div>

                        <div class="group-input">
                            <label>@lang("validation.attributes.email")</label>
                            <input type="email" name="email" value="{{ old("email",user()->email ?? '') }}">
                        </div>

                        <div class="group-input">
                            <label>@lang("validation.attributes.title")</label>
                            <input name="title">
                        </div>

                        <div class="group-input">
                            <label>@lang("validation.attributes.message")</label>
                            <input name="message">
                        </div>


                        <button type="submit" class="site-btn login-btn">@lang("labels.save")</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection