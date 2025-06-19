@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.coupons.update',["coupon" => $coupon->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    {!! Form::input("code",["value" => $coupon->code]) !!}
    {!! Form::input("begin_date",["type" => "date","value" => $coupon->begin_date->format("Y-m-d")]) !!}
    {!! Form::input("end_date",["type" => "date","value" => $coupon->end_date->format("Y-m-d")]) !!}

    {!! Form::select("discount_type",["percentage","number"],[
    "nameFunction" => fn($discount_type) => __("labels.discount_type.$discount_type"),
    "valueFunction" => fn($discount_type) => $discount_type,
    "value" => $coupon->discount_type
    ]) !!}

    {!! Form::input("discount",["type" => "number","extra" => "step=any","value" => $coupon->discount]) !!}



    {!! Form::input("limit",[
    "required" => false,
    "type" => "number",
    "title" => __("labels.number_of_times_the_coupon_is_used"),
    "tooltip" => __("messages.tooltips.leave_it_empty_if_you_want_it_unlimited"),
    "value" => $coupon->limit
    ]) !!}

    {!! Form::submit() !!}
</form>
@endsection