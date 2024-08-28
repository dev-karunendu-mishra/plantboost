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
        paging: false,
        //order: [[0, 'desc']]
    });

    new DataTable('#orders', {
        layout: {
            topStart: {
                //buttons: ['copy', 'excel', 'pdf', 'colvis']
                buttons: ['copy', 'excel', 'pdf']
            }
        },
        order: [[0, 'desc']]
    });


});