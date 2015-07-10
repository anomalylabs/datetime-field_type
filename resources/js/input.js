$(function () {

    // Initialize date pickers
    $('.datetime-field-type .datepicker').each(function () {
        $(this).datepicker({
            dateFormat: $(this).data('date-format'),
            yearRange: $(this).data('year-range'),
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true
        });
    });

    // Initialize time pickers
    $('.datetime-field-type .timepicker').each(function () {
        $(this).timepicker({
            timeFormat: $(this).data('time-format'),
            step: $(this).data('step'),
            scrollDefault: 'now'
        });
    });
});
