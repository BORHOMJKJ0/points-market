@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.products.offers.store',["product" => $product->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("POST")
    {!! Form::input("begin_date",["type" => "date"]) !!}
    {!! Form::input("end_date",["type" => "date"]) !!}
    {!! Form::input("discount_percentage",["type" => "number","extra" => "step=any max=100 min=0"]) !!}


    {!! Form::submit() !!}
</form>
@endsection