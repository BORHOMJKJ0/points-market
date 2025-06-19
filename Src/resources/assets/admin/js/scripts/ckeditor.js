var allEditors = document.querySelectorAll('.ckeditor');


for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor
        .create(allEditors[i], {
            ckfinder: {
                uploadUrl: '/api/helpers/ckeditor/upload-image'
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'blockQuote',
                    'underline',
                    'fontSize',
                    'fontFamily',
                    'fontBackgroundColor',
                    'fontColor',
                    'alignment',
                    '|',
                    'bulletedList',
                    'numberedList',
                    'insertTable',
                    '|',
                    'mediaEmbed',
                    'imageInsert',
                    '|',
                    'outdent',
                    'indent',
                    'horizontalLine',
                    '|',
                    'removeFormat',
                    'strikethrough',
                    'subscript',
                    'superscript'
                ]
            },
            language: 'ar',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side',
                    'linkImage'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells',
                    'tableCellProperties',
                    'tableProperties'
                ]
            },
        });
}
