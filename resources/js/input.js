$(document).on('ajaxComplete ready', function () {

    // Initialize inputs
    $('input[data-provides="anomaly.field_type.datetime"]:not([data-initialized])').each(function () {

        $(this).attr('data-initialized', '')
            .datetimeEntry({
                spinnerImage: '',
                timeSteps: [1, $(this).data('step')],
                datetimeFormat: $(this).data('datetime-format')
            });
    });
});
