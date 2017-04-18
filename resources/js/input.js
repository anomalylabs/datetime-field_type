$(document).on('ajaxComplete ready', function () {

    // Initialize inputs
    $('input[data-provides="anomaly.field_type.datetime"]:not([data-initialized])').each(function () {

        var $input = $(this);

        $input.attr('data-initialized', '')
            .flatpickr({
                enableTime: true,
                altInput: true,
                dateFormat: $input.data('datetime-format') || 'd.m.Y',
                minDate: 'today'
            });
    });
});
