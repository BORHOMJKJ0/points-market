<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@lang("labels.admin_panel") - @lang("pages.login")</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('assets/admin/css/themes/lite-purple.css')}}">
    <link rel="shortcut icon" href="/assets/images/favicon.png" />
</head>

<body>

    <div class="auth-layout-wrap" style="background-image: url({{ setting("admin_panel","login_background",true) }})">
        <div class="auth-content">
            <div class="row justify-content-center">
                <div class="col-md-8 co-12">
                    <div class="card o-hidden">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="/assets/images/favicon.png">
                            </div>
                            <form action="{{ route('admin.login') }}" method="POST" class="text-left">
                                @csrf
                                {!! validationErrors() !!}
                                {!! alert("danger",session("error")) !!}
                                <div class="form-group">
                                    <label for="email">{{ __("validation.attributes.email") }}</label>
                                    <input class="form-control form-control-rounded text-left" id="email" name="email" type="email" placeholder="{{ __("validation.attributes.email") }}" required value="{{ old("email") }}">
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __("validation.attributes.password") }}</label>
                                    <input class="form-control form-control-rounded text-left" id="password" name="password" type="password" placeholder="{{ __("validation.attributes.password") }}" required>
                                </div>
                                <button class="btn btn-rounded btn-primary btn-block mt-2">{{ __("labels.login") }}</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>