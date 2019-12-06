{{ assets("scripts.js", "anomaly.field_type.datetime::js/flatpickr.js") }}
{{ assets("styles.css", "anomaly.field_type.datetime::css/flatpickr.css") }}
{{ assets("styles.css", "anomaly.field_type.datetime::css/light.css") }}
{{ assets("scripts.js", "anomaly.field_type.datetime::js/filter.js") }}

<input {!! html_attributes($fieldType->attributes()) !!}>
