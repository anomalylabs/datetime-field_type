$(document).on('ajaxComplete ready', function () {

    // Initialize inputs
    $('input[data-provides="anomaly.field_type.datetime"]:not([data-initialized])').each(function () {

        $(this).attr('data-initialized', '')
            .datetimeEntry({
                spinnerImage: '',
                datetimeFormat: $(this).data('datetime-format')
                // yearRange: $(this).data('year-range'),
                // minDate: $(this).data('min'),
                // maxDate: $(this).data('max'),
                // selectOtherMonths: true,
                // showOtherMonths: true,
                // changeMonth: true,
                // changeYear: true
            });
    });
});
