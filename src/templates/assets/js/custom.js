jQuery(function($) {
    'use strict';

    $('.datatable').DataTable({
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;

                if (column.index() > 2) {
                    return;
                }

                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column.search(val ? ('^' + val + '$') : '', true, false).draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });
            });
        }
    });

    $('form[data-action="compare"] select').on('change', function(e) {
        var $form = $(this).closest('form'),
            location = WWW + 'test/compare',
            selected = true;

        $form.find('select').each(function() {
            if (!$(this).val()) {
                return selected = false;
            }

            location += '/' + $(this).val();
        });

        if (selected === true) {
            window.location = location;
        }
    });
});
