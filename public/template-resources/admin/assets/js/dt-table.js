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
        order: [[0, 'desc']],
        // initComplete: function () {
        //     this.api().columns().every(function () {
        //         var column = this;

        //         if (column.index() === 13) { // Adjust the index according to your date column
        //             var input = $('<input type="text" placeholder="Filter by date" class="form-control form-control-sm"/>')
        //                 .appendTo($(column.header()))
        //                 .on('change', function () {
        //                     var date = $(this).val();
        //                     column.search(date ? '^' + date + '$' : '', true, false).draw();
        //                 });
        //         }
        //     });
        // }
    });

});