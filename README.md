# Datetime Field Type

*anomaly.field_type.datetime*

#### A date and time picker field type.

The datetime field type provides a date-picker input with time input.

## Configuration

- `step` - any integer
- `format` - the string representation of the picker format
- `placeholder` - any string or translatable key
 
The default minutes step is 5 minutes.

#### Example

	config => [
	    'options' => [
	        'placeholder' => 'Enter your birth date',
	        'format' => 'YYYY-MM-DD hh:mm A',
	        'step' => 5
	    ]
	]
