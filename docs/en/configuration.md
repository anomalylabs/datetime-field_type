# Configuration

- [Addon Configuration](#addon)
- [Basic Configuration](#basic)
- [Extra Configuration](#extra)

<hr>

Below is the full configuration available with defaults.

    protected $fields = [
        "example" => [
            "type"   => "anomaly.field_type.country",
            "config" => [
                "default_value" => null,
                "mode"          => "datetime",
                "date_format"   => "j F, Y",
                "year_range"    => "-50:+50",
                "time_format"   => "g:i A",
                "timezone"      => null,
                "step"          => 15
            ]
        ]
    ];

<hr>

<a name="addon"></a>
## Addon Configuration

The datetime configuration options are controlled by the field type's `formats.php` configuration file by default.

You can override these options by overloading the configuration file with a config file of your own at `/resources/{reference}/config/addons/datetime-field_type/formats.php`

<div class="alert alert-success">
<strong>Contribute:</strong> If you have options to add or have found an error, submit a pull request to <a href="https://github.com/anomalylabs/datetime-field_type" target="_blank">https://github.com/anomalylabs/datetime-field_type</a>
</div>

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

    "default_type" => "now"

The `default_value` is a core option. This field type accepts any value that can be interpreted as a date/time value. This includes `timestamps`, strings readable by `strtotime`, and instances of `Carbon`.

### Input Mode

    "mode" => "date"

Specify the input mode to display. Valid options are `datetime`, `date`, or `time`.

<div class="alert alert-primary">
<strong>Note:</strong> This option determines storage format and can not be set dynamically on the form builder.
</div>

<hr>

<a name="extra"></a>
## Extra Configuration

### Date Format

    "date_format" => "m/d/Y"

Specify the date format to use for input / output. This option accepts any valid PHP date format string.

### Year Range

    "year_range" => "-10:+10"

You can limit the acceptable range of years the user can input by configuring the year range.

### Time Format

    "time_format" => "g:i A"

Specify the time format to use for input / output. This option accepts any valid PHP date format string.

### Timezone

    "timezone" => "CST"

Configure the input timezone independently from the system's timezone. By default, the value will be returned in the configured timezone as well.

Any valid PHP timezone code or value is a valid option. If none is defined the system timezone will be used by default.

<div class="alert alert-primary">
<strong>Note:</strong> You can always use the field type to translate the value into other timezones later.
</div>

### Minute Interval Step

    "step" => 30

The time's minute dropdown step can be configured by setting any integer.

<div class="alert alert-info">
<strong>Remember:</strong> The value should go into 60 evenly.
</div>
