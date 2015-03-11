$(document).ready(function() {
    // confirm all destroys
    $('form').submit(function( event ) {
        var method = $(this).children(':hidden[name=_method]').val();
        if ($.type(method) !== 'undefined' && method == 'DELETE') {
            if (!confirm('Are You Sure?')) {
                event.preventDefault();
            }
        }
    });
});