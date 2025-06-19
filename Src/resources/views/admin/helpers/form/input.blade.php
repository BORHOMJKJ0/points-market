<div class="form-group " style="@if($hidden) display:none @endif">
    <label for="{{ $id }}">
        {{ $title }} {!! $required ? "<span class='text-danger'>*</span>" : "" !!}
    </label>
    <div class="col-sm-{{ $input_width }}">
        <input type="{{ $type }}" name="{{ $name }}" placeholder='{{ $title }}' id="{{ $id }}" class="form-control tooltips {{ $class }}" title="{{ $tooltip }}" {{ $required ? "required" : "" }} value="{{ $value }}" {{ $extra }}>
    </div>
</div>