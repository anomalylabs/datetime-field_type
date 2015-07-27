# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.datetime',
        'config' => [
            'mode'        => 'datetime',
            'timezone'    => 'default',
            'date_format' => 'j F, Y',
            'year_range'  => '-50:+50',
            'time_format' => 'g:i A',
            'step'        => 15
        ]
    ]
];
```

### `mode`

The field input mode. Valid options are **datetime**, **date**, or **time**. The default value is **datetime**.

### `timezone`

The input timezone. Any valid [PHP timezone](http://php.net/manual/en/timezones.php) can be used. The default timezone of your application will be used by default.

**NOTE:** When setting a date via the API like `$entry->example = (new Carbon())->now()`, the timezone adjustment will still occur.

### `date_format`

The date input format. Any valid [PHP date format](http://php.net/manual/en/function.date.php) can be used. `'j F, Y'` is the default value.

This configuration also applies to the default output format. 

### `year_range`

The default year range of the datepicker's year dropdown. `'-50:+50'` is the default value.
   
### `time_format`

The date input format. Any valid [PHP date format](http://php.net/manual/en/function.date.php) can be used. `'g:i A'` is the default value.

This configuration also applies to the default output format. 

### `step`

The number of minutes between each option for the timepicker input. `15` is the default value.  