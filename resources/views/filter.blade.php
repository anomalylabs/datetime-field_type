{{ assets("scripts.js", "anomaly.field_type.datetime::js/flatpickr.js") }}
{{ assets("styles.css", "anomaly.field_type.datetime::css/flatpickr.css") }}
{{ assets("styles.css", "anomaly.field_type.datetime::css/light.css") }}
{{ assets("scripts.js", "anomaly.field_type.datetime::js/filter.js") }}

<input type="text" data-input-mode="range" value="{{ $fieldType->value }}" name="{{ $fieldType->input_name }}" placeholder="{{ trans($fieldType->placeholder) }}" data-datetime-format="{{ config('streams::datetime.date_format') }}" {!! html_attributes($fieldType->attributes) !!}>
