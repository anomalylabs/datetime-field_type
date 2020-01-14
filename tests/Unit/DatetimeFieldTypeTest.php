<?php

use Anomaly\DatetimeFieldType\DatetimeFieldType;

class DatetimeFieldTypeTest extends TestCase
{

    public function testResolvable()
    {
        $fieldType = app(DatetimeFieldType::class);

        $this->assertTrue($fieldType instanceof DatetimeFieldType);
    }
}
