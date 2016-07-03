jQuery(function($) {
    'use strict';


    $('form[data-action="compare"]').on('submit', function(e) {
        e.preventDefault();

        var $this = $(this),
            location = WWW + 'test/compare';

        $this.find('select').each(function() {
            location += '/' + $(this).val();
        });

        window.location = location;
    });
});