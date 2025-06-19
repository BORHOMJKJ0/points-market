@extends('admin.layouts.index')

@section('content')

@can('create', "App\Models\Coupon")
<h4 class="card-title mb-3">
    <a href="{{ route('admin.coupons.create') }}">
        <button class="btn btn-success">
            <i class="i-Add"></i> {{__("labels.add")}}
        </button>
    </a>
</h4>
@endcan

<table class="display table table-striped table-bordered dt">
    <thead>
        <tr>
            <th>@lang("validation.attributes.code")</th>
            <th>@lang("validation.attributes.begin_date")</th>
            <th>@lang("validation.attributes.end_date")</th>
            <th>@lang("validation.attributes.discount")</th>
            <th>@lang("labels.the_number_of_times_used")</th>
            <th>@lang("labels.options")</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coupons as $coupon)
        <tr>
            <td>{{ $coupon->code }}</td>
            <td>{{ $coupon->begin_date }}</td>
            <td>{{ $coupon->end_date }}</td>
            <td>{{ $coupon->discount }} {{ ($coupon->discount_type == "percentage") ? "%" : "" }}</td>
            <td>{{ $coupon->used }} </td>
            <td>


                @can('update', $coupon)
                <a href=" {{ route("admin.coupons.edit",["coupon" => $coupon->id]) }}" class="btn btn-primary btn-sm text-white tooltips" title="@lang('labels.edit')">
                    <i class="i-Pen-2"></i>
                </a>
                @endcan

                @can('delete',$coupon)
                <form method="POST" action="{{ route("admin.coupons.destroy",["coupon" => $coupon->id]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
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
@endsection

