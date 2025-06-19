@extends('admin.layouts.index')

@section('content')
<form action="{{ route("admin.products.update",["product" => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')


    {!! Form::input("name",["value" => $product->name]) !!}
    {!! Form::textarea("description",["value" => $product->description]) !!}
    {!! Form::input("price",["type" => "number","value" => $product->price]) !!}
    {!! Form::select("section",$sections,[
    "nameFunction" => fn($section) => $section->name,
    "value" => $product->section_id
    ]) !!}
    {!! Form::file("main_image",["value" => $product->main_image]) !!}
    {!! Form::file("sub_images",[
    "multiple" => true,
    "required" => false,
    "value" => $product->images,
    "multiple_file_url" => fn($image) => $image->uploads("path"),
    "multiple_delete_url" => fn($image) => route("admin.products.images.destroy",["image" => $image->id])
    ]) !!}

    {!! Form::boolean_select("active",["value" => $product->active]) !!}
    {!! Form::submit() !!}


</form>
@endsection