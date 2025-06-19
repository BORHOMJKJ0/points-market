@extends('admin.layouts.index')
@section('content')

<ul class="nav nav-tabs">
    <li class="nav-item"><a class="nav-link {{ current_tab("#general") }}" data-toggle="tab" href="#general">@lang("labels.settings.general")</a></li>
    <li class="nav-item"><a class="nav-link {{ current_tab("#admin_panel") }}" data-toggle="tab" href="#admin_panel">@lang("labels.settings.admin_panel")</a></li>
    <li class="nav-item"><a class="nav-link {{ current_tab("#contact") }}" data-toggle="tab" href="#contact">@lang("labels.settings.contact")</a></li>
</ul>
<div class="tab-content">




    <div class="tab-pane fade {{ current_tab("#general") }}" id="general" role="tabpanel">
        <form action="{{ route('admin.settings.update',["mainKey" => "general"]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")


            {!! Form::textarea("about",["value" => setting("general","about") ,"required" => false]) !!}

            @can('update', "App\Models\Setting")
            {!! Form::submit() !!}
            @endcan
        </form>
    </div>
    <div class="tab-pane fade {{ current_tab("#admin_panel") }}" id="admin_panel" role="tabpanel">
        <form action="{{ route('admin.settings.update',["mainKey" => "admin_panel"]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")

            {!! Form::select("theme",["lite-purple","lite-blue"],[
            "valueFunction" => fn($theme) => $theme,
            "nameFunction" => fn($theme) => __("labels.theme.$theme"),
            "value" => setting("admin_panel","theme") ,
            "required" => false,
            "with_not_exists" => false
            ]) !!}

            {!! Form::file("login_background",["value" => setting("admin_panel","login_background") ,"required" => false]) !!}

            @can('update', "App\Models\Setting")
            {!! Form::submit() !!}
            @endcan
        </form>
    </div>
    <div class="tab-pane fade {{ current_tab("#contact") }}" id="contact" role="contact">
        <form action="{{ route('admin.settings.update',["mainKey" => "contact"]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")

            {!! Form::input("email",["value" => setting("contact","email") ,"required" => false,"type" => "email"]) !!}
            {!! Form::input("phone",["value" => setting("contact","phone") ,"required" => false]) !!}
            {!! Form::input("facebook",["value" => setting("contact","facebook") ,"required" => false,"type" => "url"]) !!}
            {!! Form::input("twitter",["value" => setting("contact","twitter") ,"required" => false,"type" => "url"]) !!}
            {!! Form::input("youtube",["value" => setting("contact","youtube") ,"required" => false,"type" => "url"]) !!}
            {!! Form::input("instagram",["value" => setting("contact","instagram") ,"required" => false,"type" => "url"]) !!}

            @can('update', "App\Models\Setting")
            {!! Form::submit() !!}
            @endcan
        </form>
    </div>






</div>
@endsection