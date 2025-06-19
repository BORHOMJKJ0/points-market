
<div id="{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-{{ $width }}">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                {!! view($view,$attributes)->render() !!}
            </div>
        </div>
    </div>
</div>