@extends('admin.layouts.index')

@section('content')

<h4 class="card-title mb-3">
    <a href="{{ route('admin.roles.create') }}">
        <button class="btn btn-success">
            <i class="i-Add"></i> {{__("labels.add")}}
        </button>
    </a>
</h4>

<div class="table-responsive">
    <table class="display table table-striped table-bordered dt" >
        <thead>
            <tr>
                <th>@lang("labels.sort") </th>
                <th>@lang("validation.attributes.name") </th>
                <th>@lang("validation.attributes.permissions") </th>
                <th>@lang("labels.options")</th>
            </tr>
        </thead>
        <tbody class="sortable" table-name="roles">
            @foreach ($roles as $role)
            <tr item-id="{{ $role->id }}">
                <td><i class="i-Cursor-Move "></i></td>
                <td>{{ $role->name }}</td>
                <td>
                    @foreach ($role->permissions as $permission)
                    <span class="badge badge-pill badge-secondary p-2 m-1">{{__("permissions.$permission")}}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route("admin.roles.edit",["role" => $role->id]) }}" class="btn btn-primary btn-sm text-white tooltips" title="@lang('labels.edit')">
                        <i class="i-Pen-2"></i>
                    </a>

                    <form method="POST" action="{{ route("admin.roles.destroy",["role" => $role->id]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
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