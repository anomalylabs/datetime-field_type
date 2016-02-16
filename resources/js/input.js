$(function () {

    // Initialize date pickers
    $('.datetime-field_type .datepicker').each(function () {

        $(this).prev('.icon').click(function() {
            $(this).next('.datepicker').focus();
        });

        $(this).datepicker({
            dateFormat: $(this).data('date-format'),
            yearRange: $(this).data('year-range'),
            minDate: $(this).data('min'),
            maxDate: $(this).data('max'),
            selectOtherMonths: true,
            showOtherMonths: true,
            changeMonth: true,
            changeYear: true
        });
    });

    // Initialize time pickers
    $('.datetime-field_type .timepicker').each(function () {

        $(this).prev('.icon').click(function() {
            $(this).next('.timepicker').focus();
        });

        $(this).timepicker({
            timeFormat: $(this).data('time-format'),
            step: $(this).data('step'),
            scrollDefault: 'now'
        });
    });
});
