$(document).ready(function () {
    new DataTable('#example', {
        layout: {
            topStart: {
                //buttons: ['copy', 'excel', 'pdf', 'colvis']
                buttons: ['copy', 'excel', 'pdf']
            }
        }
    });

    new DataTable('#delivery-options', {
        info: false,
        ordering: false,
        paging: false
    });
});