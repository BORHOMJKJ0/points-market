@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.coupons.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("POST")

    {!! Form::input("code") !!}
    {!! Form::input("begin_date",["type" => "date"]) !!}
    {!! Form::input("end_date",["type" => "date"]) !!}

    {!! Form::select("discount_type",["percentage","number"],[
    "nameFunction" => fn($discount_type) => __("labels.discount_type.$discount_type"),
    "valueFunction" => fn($discount_type) => $discount_type,
    ]) !!}

    {!! Form::input("discount",["type" => "number","extra" => "step=any"]) !!}


    {!! Form::input("limit",[
    "required" => false,
    "type" => "number",
    "title" => __("labels.number_of_times_the_coupon_is_used"),
    "tooltip" => __("messages.tooltips.leave_it_empty_if_you_want_it_unlimited")
    ]) !!}

    {!! Form::submit() !!}
</form>
@endsection