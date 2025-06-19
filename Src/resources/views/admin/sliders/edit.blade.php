@extends('admin.layouts.index')
@section('content')

<form action="{{ route('admin.sliders.update',["slider" => $slider->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    {!! Form::file("image",["value" => $slider->image]) !!}
  
    {!! Form::input("link",["type" => "url","required" => false,"value" => $slider->link]) !!}
    {!! Form::submit() !!}
</form>
@endsection