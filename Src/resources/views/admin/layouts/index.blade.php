@include("admin.layouts.header")

@isset($without_card)


{!! alert("success",session("success")) !!}
{!! alert("danger",session("error")) !!}
{!! alert("info",session("info")) !!}
{!! validationErrors() !!}

@yield('content')


@else
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">

                {!! alert("success",session("success")) !!}
                {!! alert("danger",session("error")) !!}
                {!! alert("info",session("info")) !!}
                {!! validationErrors() !!}

                @yield('content')

            </div>
        </div>
    </div>

</div>

@endisset









@include("admin.layouts.footer")