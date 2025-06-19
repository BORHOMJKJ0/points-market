@extends('admin.layouts.index')

@section('content')


@can('create', "App\Models\Section")
<h4 class="card-title mb-3">
    <a href="{{ route('admin.sections.create') }}">
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
                <th>@lang("labels.sort") </th>
                <th>@lang("validation.attributes.name") </th>
                <th>@lang("labels.options")</th>
            </tr>
        </thead>
        <tbody class="sortable" table-name="sections">
            @foreach ($sections as $section)
            <tr item-id="{{ $section->id }}">
                <td><i class="i-Cursor-Move"></i></td>
                <td>{{$section->name}}</td>
                <td>
                    @can('update', $section)
                    <a href=" {{ route("admin.sections.edit",["section" => $section->id]) }}" class="btn btn-primary btn-sm text-white tooltips" title="@lang('labels.edit')">
                        <i class="i-Pen-2"></i>
                    </a>
                    @endcan

                    @can('delete',$section)
                    <form method="POST" action="{{ route("admin.sections.destroy",["section" => $section->id]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
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