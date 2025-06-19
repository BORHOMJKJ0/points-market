$(".dt").DataTable({
    "order": [],
    "language": jsConfig.locale.datatable,
    "lengthMenu": [
        [10, 50, 100, 500, -1],
        [10, 50, 100, 500, jsConfig.locale.labels.all]
    ]
})
