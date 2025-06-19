@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.roles.update',["role" => $role->id]) }}" method="post">
    @csrf
    @method('PATCH')

    {!! Form::input("name",["value" => $role->name]) !!}
    {!! Form::select("permissions",$permissions,[
    "nameFunction" => fn($permission) => __("permissions.$permission"),
    "valueFunction" => fn($permission) => $permission,
    "multiple" => true,
    "value" => $role->permissions
    ]) !!}

    {!! Form::submit() !!}
</form>
@endsection