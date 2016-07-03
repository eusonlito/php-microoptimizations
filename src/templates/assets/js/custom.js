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
            location = '',
            tests = 0;

        $form.find('select').each(function() {
            if (!$(this).val()) {
                return;
            }

            location += '/' + $(this).val();
            tests++;
        });

        if (tests === 1) {
            window.location = WWW + 'test/detail' + location;
        } else if (tests === 2) {
            window.location = WWW + 'test/compare' + location;
        }
    });
});
