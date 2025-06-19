@extends('admin.layouts.index')

@section('content')
@can('create', "App\Models\Slider")
<h4 class="card-title mb-3">
    <a href="{{ route('admin.sliders.create') }}">
        <button class="btn btn-success">
            <i class="i-Add"></i> {{__("labels.add")}}
        </button>
    </a>
</h4>
@endcan


<div class="table-responsive">
    <table class="display table table-striped table-bordered dt" style="width:100%">
        <thead>
            <tr>
                <th>@lang("labels.sort") </th>


                <th>@lang("validation.attributes.image") </th>
                <th>@lang("validation.attributes.link") </th>
                <th>@lang("labels.options")</th>
            </tr>
        </thead>
        <tbody class="sortable" table-name="sliders">
            @foreach ($sliders as $slider)
            <tr item-id="{{ $slider->id }}" >
                <td><i class="i-Cursor-Move"></i></td>


                <td>
                    <img src="{{ $slider->uploads("image") }}" width="100">
                </td>
                <td>
                    <a href="{{ $slider->link }}">
                        {{ $slider->link }}
                    </a>
                </td>


                <td>
                    @can('update', $slider)
                    <a href="{{ route("admin.sliders.edit",["slider" => $slider->id]) }}" class="btn btn-primary btn-sm text-white tooltips" title="@lang('labels.edit')">
                        <i class="nav-icon i-Pen-2"></i>
                    </a>
                    @endcan

                    @can('delete', $slider)
                    <form onclick="$(this).submit()" method="POST" action="{{ route("admin.sliders.destroy",["slider" => $slider->id]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
                        @csrf
                        @method("DELETE")
                        <i class="nav-icon i-Remove"></i>
                    </form>
                    @endcan

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection