@extends('admin.layouts.index')

@section('content')


@can('create', "App\Models\Product\Product")
<h4 class="card-title mb-3">
    <a href="{{ route('admin.products.create') }}">
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
                <th>@lang("validation.attributes.price") </th>
                <th>@lang("validation.attributes.section") </th>
                <th>@lang("validation.attributes.quantity") </th>
                <th>@lang("validation.attributes.active") </th>
                <th>@lang("labels.options")</th>
            </tr>
        </thead>
        <tbody class="sortable" table-name="products">
            @foreach ($products as $product)
            <tr item-id="{{ $product->id }}">
                <td><i class="i-Cursor-Move"></i></td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}} @lang("labels.ryal")</td>
                <td>{{$product->section->name}}</td>
                <td>{{$product->quantity}}</td>
                <td>@include('helpers.labels.yes_no',["boolean" => $product->active])</td>
                <td>

                    @can('view', $product)
                    <a href=" {{ route("admin.products.show",["product" => $product->id]) }}" class="btn btn-dark btn-sm text-white tooltips" title="@lang('labels.show')">
                        <i class="i-Eye"></i>
                    </a>
                    @endcan

                    @can('update', $product)
                    <a href=" {{ route("admin.products.edit",["product" => $product->id]) }}" class="btn btn-primary btn-sm text-white tooltips" title="@lang('labels.edit')">
                        <i class="i-Pen-2"></i>
                    </a>
                    @endcan

                    @can('delete',$product)
                    <form method="POST" action="{{ route("admin.products.destroy",["product" => $product->id]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
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