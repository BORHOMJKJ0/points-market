@extends('admin.layouts.index')

@section('content')
<h4 class="card-title mb-3">
    <a href="{{ route('admin.admins.create') }}">
        <button class="btn btn-success">
            <i class="i-Add"></i> {{__("labels.add")}}
        </button>
    </a>
</h4>

<div class="table-responsive">
    <table class="display table table-striped table-bordered dt" >
        <thead>
            <tr>

                <th>@lang("validation.attributes.avatar") </th>
                <th>@lang("validation.attributes.name") </th>
                <th>@lang("validation.attributes.email") </th>
                <th>@lang("validation.attributes.super_admin") </th>
                <th>@lang("labels.options")</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>
                    <img src="{{ $admin->avatar() }}" width="36" height="36" class="rounded-circle">
                </td>
                <td>{{ $admin->name }}

                </td>
                <td>{{$admin->email}}</td>

                <td>
                    @include('helpers.labels.yes_no',["boolean" => $admin->super])
                </td>


                <td>

                    <a href="{{ route("admin.admins.edit",["admin" => $admin->id]) }}" class="btn btn-primary btn-sm text-white tooltips" title="@lang('labels.edit')">
                        <i class="i-Pen-2"></i>
                    </a>
                    <form method="POST" action="{{ route("admin.admins.destroy",["admin" => $admin->id]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
                        @csrf
                        @method("DELETE")
                        <i class="i-Remove"></i>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection