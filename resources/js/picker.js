(function (window, document) {

    let fields = Array.prototype.slice.call(
        document.querySelectorAll('input[data-provides="anomaly.field_type.datetime"]:not(.flatpickr-input)')
    );

    // Initialize inputs
    fields.forEach(function (field) {

        if (!field.getAttribute('readonly')) {

            let inputMode = field.getAttribute('data-input-mode');
            let clearToggle = field.parentElement.querySelector('a[data-clear]');

            let options = {
                altInput: true,
                allowInput: false,
                locale: field.getAttribute('data-locale'),
                altFormat: field.getAttribute('data-alt-format'),
                minuteIncrement: field.getAttribute('data-step') || 1,
                dateFormat: field.getAttribute('data-datetime-format'),
                time_24hr: Boolean(field.getAttribute('data-alt-format').match(/[GH]/)),
                enableTime: inputMode !== 'date',
                noCalendar: inputMode === 'time',
                onReady: function (datetime) {
                    console.log(datetime.toLocaleString(
                        field.getAttribute('data-locale'),
                        {
                            timeZone: field.getAttribute('data-datetime-format')
                        })
                    );
                }
            };

            let picker = field.flatpickr(options);

            if (clearToggle) {

                clearToggle.addEventListener('click', function (event) {

                    event.preventDefault();

                    picker.clear();
                });
            }
        }
    });
})(window, document);
