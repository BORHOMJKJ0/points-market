@extends('admin.layouts.index')
@section('content')

<form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("POST")
    {!! Form::file("image") !!}
    {!! Form::input("link",["type" => "url","required" => false]) !!}
    {!! Form::submit() !!}
</form>
@endsection