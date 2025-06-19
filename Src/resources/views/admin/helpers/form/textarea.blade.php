

<div class="form-group">
    <label for="{{ $id }}">
        {{ $title }} {!! $required ? "<span class='text-danger'>*</span>" : "" !!}
    </label>
    <div class="col-sm-{{ $input_width }}">
        <textarea id="{{ $id }}" name="{{ $name }}" title="{{ $tooltip }}" placeholder='{{ $title }}' class="form-control {{ $ckeditor  ? "ckeditor" : "" }} tooltips" @if (!$ckeditor && $required) required @endif {{ $extra }}>{{$value}}</textarea>
    </div>
</div>