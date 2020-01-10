<?php

use Anomaly\DatetimeFieldType\DatetimeFieldType;
use Anomaly\DatetimeFieldType\DatetimeFieldTypeServiceProvider;

class DatetimeFieldTypeServiceProviderTest extends TestCase
{

    public function testProvides()
    {
        $provider = app(DatetimeFieldTypeServiceProvider::class, ['app' => app()]);

        $provides = $provider->provides();

        $this->assertTrue(in_array(DatetimeFieldType::class, $provides));
        $this->assertTrue(in_array('anomaly.field_type.datetime', $provides));
    }
}
