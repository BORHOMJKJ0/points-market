@extends('admin.layouts.index')

@section('content')


@can('create', "App\Models\User\User")
<h4 class="card-title mb-3">
    <a href="{{ route('admin.users.create') }}">
        <button class="btn btn-success">
            <i class="i-Add"></i> {{__("labels.add")}}
        </button>
    </a>
</h4>
@endcan

<div class="table-responsive">
    <table class="display table table-striped table-bordered dt">
        <thead>
            <tr>
                <th>@lang("validation.attributes.name") </th>
                <th>@lang("validation.attributes.phone") </th>
                <th>@lang("validation.attributes.email") </th>
                <th>@lang("labels.options")</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @can('update', $user)
                    <a href=" {{ route("admin.users.edit",["user" => $user->id]) }}" class="btn btn-primary btn-sm text-white tooltips" title="@lang('labels.edit')">
                        <i class="i-Pen-2"></i>
                    </a>
                    @endcan

                    @can('delete',$user)
                    <form method="POST" action="{{ route("admin.users.destroy",["user" => $user->id]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
                        @csrf
                        @method("DELETE")
                        <i class="i-Remove"></i>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection