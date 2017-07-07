$(document).on('ajaxComplete ready', function () {

    // Initialize inputs
    $('input[data-provides="anomaly.field_type.datetime"]:not([data-initialized])').each(function () {

        var $this = $(this);

        $this.attr('data-initialized', '')
            .flatpickr({
                altInput: true,
                allowInput: true,
                minuteIncrement: $this.data('step'),
                dateFormat: $this.data('datetime-format'),
                enableTime: $this.data('input-mode').indexOf('time') !== -1
            });
    });
});
