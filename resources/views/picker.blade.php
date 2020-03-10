{{ assets("scripts.js", "anomaly.field_type.datetime::js/flatpickr.js") }}

{{ assets("styles.css", "anomaly.field_type.datetime::css/flatpickr.css") }}
{{ assets("styles.css", "anomaly.field_type.datetime::css/light.css") }}
{{ assets("styles.css", "anomaly.field_type.datetime::css/picker.css") }}

@foreach (config('streams::locales.enabled') as $locale)
{{ assets("scripts.js", "anomaly.field_type.datetime::js/l10n/" . $locale . ".js", ["ignore"]) }}    
@endforeach

{{ assets("scripts.js", "anomaly.field_type.datetime::js/l10n/" . config('app.locale') . ".js", ["ignore"]) }}

{{ assets("scripts.js", "anomaly.field_type.datetime::js/picker.js") }}

<div class="input-group">

    @if ($fieldType->isReadonly())
    <a href="#" class="input-group-addon" data-clear>
        <i class="fa fa-times"></i>
    </a>
    @endif

    <input {!! html_attributes($fieldType->attributes()) !!}>

    @if ($fieldType->config('mode'))
    <span class="datetime__timezone input-group-addon">
        {{ $fieldType->config('timezone') }}
    </span>
    @endif

</div>
