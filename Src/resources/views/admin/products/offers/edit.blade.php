@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.products.offers.update',["product" => $product->id,"offer" => $offer->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    {!! Form::input("begin_date",["type" => "date","value" => $offer->begin_date->format("Y-m-d")]) !!}
    {!! Form::input("end_date",["type" => "date","value" => $offer->end_date->format("Y-m-d")]) !!}
    {!! Form::input("discount_percentage",["type" => "number","extra" => "step=any max=100 min=0","value" => $offer->discount_percentage]) !!}


    {!! Form::submit() !!}
</form>
@endsection