@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {!! Form::input("name") !!}
    {!! Form::input("phone") !!}
    {!! Form::input("email",["type" => "email"]) !!}
    {!! Form::input("password",["type" => "password"]) !!}
    {!! Form::input("password_confirmation",["type" => "password"]) !!}
    {!! Form::submit() !!}
</form>
@endsection