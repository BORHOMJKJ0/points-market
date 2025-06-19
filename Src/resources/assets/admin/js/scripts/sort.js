$(".sortable").sortable({
    handle: ".i-Cursor-Move",
    update: function (event, ui) {
        
        let table_name = $(this).attr("table-name");
        let ids = [];


        $(this).find('tr').each(function () {
            ids.push($(this).attr("item-id"));
        });

        $.ajax({
            url: "/api/helpers/sorting",
            type: "post",
            data: {
                ids: ids,
                table_name: table_name
            }
        });
    }
});
