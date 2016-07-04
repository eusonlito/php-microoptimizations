jQuery(function($) {
    'use strict';

    $('.datatable').DataTable({
        bPaginate: false,
        sDom: 'rt',
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;

                if (column.index() > 1) {
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

    var $filter = $('[data-filter]');

    if ($filter.length) {
        $filter.each(function() {
            $($(this).data('filter')).each(function() {
                var $element = $(this);
                $element.data('text', $element.text().toLowerCase());
            });
        });

        $filter.on('keyup', function(e) {
            var $this = $(this),
                value = $this.val().toLowerCase();

            if (e.keyCode === 27) {
                return $this.val('').trigger('keyup');
            }

            if ((e.keyCode === 13) || (e.keyCode === 40)){
                return false;
            }

            $($this.data('filter')).each(function() {
                var $element = $(this);

                if ($element.data('text').indexOf(value) === -1) {
                    $element.hide();
                } else {
                    $element.show();
                }
            });
        });
    }
});
