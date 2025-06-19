@extends('admin.layouts.index')

@section('content')
<form action="{{ route('admin.roles.store') }}" method="post">
    @csrf
    @method("POST")
    {!! Form::input("name") !!}
    {!! Form::select("permissions",$permissions,[
    "nameFunction" => fn($permission) => __("permissions.$permission"),
    "valueFunction" => fn($permission) => $permission,
    "multiple" => true
    ]) !!}

    {!! Form::submit() !!}
</form>
@endsection