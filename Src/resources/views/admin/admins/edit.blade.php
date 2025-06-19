@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.admins.update',["admin" => $admin->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    {!! Form::input("name",["value" => $admin->name]) !!}
    {!! Form::input("email",["type" => "email","value" => $admin->email]) !!}
    {!! Form::input("password",["required" => false,"type" => "password","tooltip" => __("messages.tooltips.leave_it_empty_if_you_wont_update")]) !!}
    {!! Form::input("password_confirmation",["required" => false,"type" => "password","tooltip" => __("messages.tooltips.leave_it_empty_if_you_wont_update")]) !!}
    {!! Form::select("roles",$roles,[
    "multiple" => true,
    "nameFunction" => fn($role) => $role->name,
    "required" => false,
    "value" => $admin->roles,
    ]) !!}
    {!! Form::boolean_select("super_admin",["value" => $admin->super]) !!}

    {!! Form::file("avatar",["required" => false,"value" => $admin->avatar]) !!}

    {!! Form::submit() !!}
</form>
@endsection