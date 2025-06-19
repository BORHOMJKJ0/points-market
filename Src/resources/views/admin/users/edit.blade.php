@extends('admin.layouts.index')

@section('content')
<form action="{{ route("admin.users.update",["user" => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')


    {!! Form::input("name",["value" => $user->name]) !!}
    {!! Form::input("phone",["value" => $user->phone]) !!}
    {!! Form::input("email",["type" => "email","value" => $user->email]) !!}
    {!! Form::input("password",["required" => false,"type" => "password","tooltip" => __("messages.tooltips.leave_it_empty_if_you_wont_update")]) !!}
    {!! Form::input("password_confirmation",["required" => false,"type" => "password","tooltip" => __("messages.tooltips.leave_it_empty_if_you_wont_update")]) !!}


    {!! Form::submit() !!}


</form>
@endsection