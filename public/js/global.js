
document.addEventListener("DOMContentLoaded", function () {
    const firstInvalidElement = document.querySelector(".is-invalid");
    const firstInvalidFeedbackElement = document.querySelector(".invalid-feedback");
    const firstAlertSuccessElement = document.querySelector(".alert-success");

    if (firstInvalidElement) {
        firstInvalidElement.focus();
    } else if (firstInvalidFeedbackElement) {
        firstInvalidFeedbackElement.focus()
    } else if (firstAlertSuccessElement) {
        firstAlertSuccessElement.focus()
    }
});
//lBfrtip
const tbConfig = {
    scrollX: true,
    "scrollY": "400px",
    "scrollCollapse": true,
    "paging": false,
    dom: 'Bfrti',
    "language": {
        "lengthMenu": "<b>Entries</b> _MENU_",
    },
    buttons: [
        // { extend: 'copy', exportOptions: { columns: ':not(:last-child)' } },
        // { extend: 'csv', exportOptions: { columns: ':not(:last-child)' } },
        // { extend: 'excel', exportOptions: { columns: ':not(:last-child)' } },
        // { extend: 'pdf', exportOptions: { columns: ':not(:last-child)' } },
        // { extend: 'print', exportOptions: { columns: ':not(:last-child)' } }
        {
            extend: 'collection',
            text: 'Export',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: { columns: ':not(:last-child)' }
                },
                {
                    extend: 'excel',
                    exportOptions: { columns: ':not(:last-child)' }
                },
                {
                    extend: 'csv',
                    exportOptions: { columns: ':not(:last-child)' }
                },
                {
                    extend: 'pdf',
                    exportOptions: { columns: ':not(:last-child)' },
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ],
        }
    ],
};

// data tables
var myTable = new DataTable('#myTable', tbConfig);

