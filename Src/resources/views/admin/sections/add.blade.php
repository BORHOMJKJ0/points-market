@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.sections.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {!! Form::input("name") !!}
    {!! Form::submit() !!}
</form>
@endsection