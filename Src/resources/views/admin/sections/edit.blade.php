@extends('admin.layouts.index')

@section('content')
<form action="{{ route("admin.sections.update",["section" => $section->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')


    {!! Form::input("name",["value" => $section->name]) !!}

    {!! Form::submit() !!}


</form>
@endsection