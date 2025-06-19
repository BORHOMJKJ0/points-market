@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.admins.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("POST")
    {!! Form::input("name") !!}
    {!! Form::input("email",["type" => "email"]) !!}
    {!! Form::input("password",["type" => "password"]) !!}
    {!! Form::input("password_confirmation",["type" => "password"]) !!}
    {!! Form::select("roles",$roles,[
    "multiple" => true,
    "nameFunction" => fn($role) => $role->name,
    "required" => false
    ]) !!}
    {!! Form::boolean_select("super_admin") !!}

    {!! Form::file("avatar",["required" => false]) !!}

    {!! Form::submit() !!}
</form>
@endsection