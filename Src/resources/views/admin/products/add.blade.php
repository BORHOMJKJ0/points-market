@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {!! Form::input("name") !!}
    {!! Form::textarea("description") !!}
    {!! Form::input("price",["type" => "number"]) !!}
    {!! Form::select("section",$sections,[
    "nameFunction" => fn($section) => $section->name
    ]) !!}
    {!! Form::file("main_image") !!}
    {!! Form::file("sub_images",["multiple" => true,"required" => false]) !!}
    {!! Form::boolean_select("active") !!}

    {!! Form::submit() !!}
</form>
@endsection