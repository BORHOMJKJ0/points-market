<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>@lang("labels.admin_panel") - {{ $page_title }}</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sl-1.3.1/datatables.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href='{{ mix("assets/admin/css/themes/$theme.css")}}'>
    <link rel="shortcut icon" href="/assets/images/favicon.png" />
    @yield("header_assets")
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="logo">
                <img src="/assets/images/favicon.png">
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div style="margin: auto"></div>
            <div class="header-part-right">
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>


                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img src="{{ admin()->avatar() }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="i-Lock-User mr-1"></i> {{admin()->name}}
                            </a>


                            <a class="dropdown-item" href="#" onclick="$('#logoutForm').submit()">
                                @lang("labels.logout")
                                <form id="logoutForm" method="POST" action="{{ route("admin.logout") }}">@csrf</form>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.sidebar')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>{{$page_title}}</h1>

                    <ul>

                        @if (!request()->is("admin"))
                        <li>
                            <a class="active" href="{{ route("admin.home") }}">{{ __("pages.home") }} </a>
                        </li>

                        @foreach ($breadcrumbs ?? [$page_title => null] as $name => $route)
                        <li>
                            <a class="{{ $route ? "active" : "" }}" href="{{($route && !filter_var($route, FILTER_VALIDATE_URL)) ? route($route) :  $route  ??  "#" }}">
                                {{ $name }}
                            </a>
                        </li>
                        @endforeach
                        @endif


                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>