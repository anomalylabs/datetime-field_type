{{ assets("scripts.js", "anomaly.field_type.datetime::js/flatpickr.js") }}
{{ assets("styles.css", "anomaly.field_type.datetime::css/flatpickr.css") }}
{{ assets("styles.css", "anomaly.field_type.datetime::css/light.css") }}
{{ assets("scripts.js", "anomaly.field_type.datetime::js/filter.js") }}

<input type="text" class="form-control" data-input-mode="range" value="{{ $field_type->value }}" name="{{ $field_type->input_name }}" placeholder="{{ trans($field_type->placeholder) }}" data-datetime-format="{{ config('streams::datetime.date_format') }}" {{ html_attributes($field_type->attributes) }}>
