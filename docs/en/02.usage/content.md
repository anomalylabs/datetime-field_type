---
title: Usage
---

## Usage[](#usage)

This section will show you how to use the field type via API and in the view layer.


### Setting Values[](#usage/setting-values)

You can set the datetime field type value with a timestamp.

    $entry->example = date("U");

You can also use any string interpretable by the `strtotime` method.

    $entry->example = "now";

    $entry->example = "+2 days";

Lastly, you can also set the value with an instance of `Carbon`.

    $entry->example = new Carbon;


### Basic Output[](#usage/basic-output)

The datetime field type returns `null` or an instance of `Carbon` in the configured timezone.

You can learn more about Carbon's API here: [http://carbon.nesbot.com/docs](http://carbon.nesbot.com/docs/)

    $entry->example->format('l jS \\of F Y h:i:s A'); // Thursday 25th of December 1975 02:15:16 PM;


### Presenter Output[](#usage/presenter-output)

This section will show you how to use the decorated value provided by the `\Anomaly\DatetimeFieldType\DatetimeFieldTypePresenter` class.


#### DatetimeFieldTypePresenter::format()[](#usage/presenter-output/datetimefieldtypepresenter-format)

The `format` method maps to the `Carbon::format()` method.

###### Returns: `string`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$format

</td>

<td>

false

</td>

<td>

string

</td>

<td>

The configured format.

</td>

<td>

A PHP date format.

</td>

</tr>

</tbody>

</table>

###### Example

    $decorated->example->format();

###### Twig

    {{ decorated.example.format() }}


#### DatetimeFieldTypePresenter::date()[](#usage/presenter-output/datetimefieldtypepresenter-date)

The `date` method returns the formatted date portion of the value only.

###### Returns: `string`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$format

</td>

<td>

false

</td>

<td>

string

</td>

<td>

The configured value.

</td>

<td>

A PHP date format.

</td>

</tr>

</tbody>

</table>

###### Example

    $decorated->example->date();

###### Twig

    {{ decorated.example.date() }}


#### DatetimeFieldTypePresenter::time()[](#usage/presenter-output/datetimefieldtypepresenter-time)

The `time` method returns the formatted time portion of the value only.

###### Returns: `string`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$format

</td>

<td>

false

</td>

<td>

string

</td>

<td>

The configured value.

</td>

<td>

A PHP date format.

</td>

</tr>

</tbody>

</table>

###### Example

    $decorated->example->time();

###### Twig

    {{ decorated.example.time() }}


#### DatetimeFieldTypePresenter::local()[](#usage/presenter-output/datetimefieldtypepresenter-local)

The `local` method returns the formatted value in the users active timezone.

###### Returns: `string`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$format

</td>

<td>

false

</td>

<td>

string

</td>

<td>

The configured format.

</td>

<td>

A PHP date format.

</td>

</tr>

</tbody>

</table>

###### Example

    $decorated->example->local();

###### Twig

    {{ decorated.example.local() }}


#### DatetimeFieldTypePresenter::timeAgo()[](#usage/presenter-output/datetimefieldtypepresenter-timeago)

The `timeAgo` ago method maps to `Carbon::diffForHumans()`.

###### Returns: `string`

###### Example

    $decorated->example->timeAgo();

###### Twig

    {{ decorated.example.timeAgo() }}


#### DatetimeFieldTypePresenter::iso()[](#usage/presenter-output/datetimefieldtypepresenter-iso)

The `iso` method is a shortcut for returning the ISO 8601 formatted value.

###### Returns: `string`

###### Example

    $decorated->example->iso();

###### Twig

    {{ decorated.example.iso() }}


#### DatetimeFieldTypePresenter::rfc()[](#usage/presenter-output/datetimefieldtypepresenter-rfc)

The `rfc` method is a shortcut for returning the RFC 2822 formatted value.

###### Returns: `string`

###### Example

    $decorated->example->rfc();

###### Twig

    {{ decorated.example.rfc() }}


#### DatetimeFieldTypePresenter::__call()[](#usage/presenter-output/datetimefieldtypepresenter-call)

The `__call` magic method is mapped to `Carbon`.

###### Example

    $decorated->example->toDayDateTimeString();

###### Twig

    {{ decorated.example.toDayDateTimeString() }}
