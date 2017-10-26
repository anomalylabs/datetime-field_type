$(document).on('ajaxComplete ready', function () {

    // Initialize inputs
    $('input[data-provides="anomaly.field_type.datetime"]:not([data-initialized])').each(function () {

        var $this = $(this);
        var inputMode = $this.data('input-mode');

        var options = {
            altInput: true,
            allowInput: true,
            locale: $this.data('locale'),
            minuteIncrement: $this.data('step') || 1,
            dateFormat: $this.data('datetime-format'),
            time_24hr: Boolean($this.data('datetime-format').match(/[GH]/)),
            enableTime: inputMode !== 'date',
            noCalendar: inputMode === 'time'
        };

        $this.attr('data-initialized', '').flatpickr(options);
    });
});
