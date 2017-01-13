$(function () {

    // Initialize date pickers
    $('input[data-provides="anomaly.field_type.datetime"][name$="[date]"]:not([data-initialized])').each(function () {

        var input = $(this);

        input.prev('.icon').click(function () {
            input.focus();
        });

        input
            .attr('data-initialized', '')
            .datepicker({
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
    $('input[data-provides="anomaly.field_type.datetime"][name$="[time]"]').each(function () {

        var input = $(this);

        input.prev('.icon').click(function () {
            input.focus();
        });

        $(this).timepicker({
            timeFormat: $(this).data('time-format'),
            step: $(this).data('step'),
            scrollDefault: 'now'
        });
    });
});
