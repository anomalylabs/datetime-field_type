$(document).on('ajaxComplete ready', function () {

    // Initialize inputs
    $('input[data-provides="anomaly.field_type.datetime"]:not([data-initialized])').each(function () {

        var $this = $(this);

        var options = {
            mode: 'range',
            altInput: true,
            allowInput: true,
            minuteIncrement: $this.data('step') || 1,
            dateFormat: $this.data('datetime-format')
        };

        $this.attr('data-initialized', '').flatpickr(options);
    });
});
