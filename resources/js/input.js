$(function () {

    // Initialize date pickers
    $('.datepicker').each(function () {
        $(this).datepicker({
            dateFormat: $(this).data('date-format'),
            yearRange: $(this).data('year-range'),
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true
        });
    });

    // Initialize time pickers
    $('.timepicker').each(function () {
        $(this).timepicker({
            timeFormat: $(this).data('time-format'),
            step: $(this).data('time-step'),
            scrollDefault: 'now'
        });
    });
});
