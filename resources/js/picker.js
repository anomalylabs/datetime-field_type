$(document).on('ajaxComplete ready', function () {

    // Initialize inputs
    $('input[data-provides="anomaly.field_type.datetime"]:not([data-initialized])').each(function () {

        let $this = $(this);
        let inputMode = $this.data('input-mode');

        let options = {
            altInput: true,
            allowInput: false,
            locale: $this.data('locale'),
            minuteIncrement: $this.data('step') || 1,
            altFormat: $this.data('alt-format'),
            dateFormat: $this.data('datetime-format'),
            time_24hr: Boolean($this.data('alt-format').match(/[GH]/)),
            enableTime: inputMode !== 'date',
            noCalendar: inputMode === 'time'
        };

        $this.attr('data-initialized', '').flatpickr(options);
    });
});
