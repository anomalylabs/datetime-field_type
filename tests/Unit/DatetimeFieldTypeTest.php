<?php

use Anomaly\MultipleFieldType\MultipleFieldType;

class MultipleFieldTypeTest extends TestCase
{

    public function testResolvable()
    {
        $fieldType = app(MultipleFieldType::class);

        $this->assertTrue($fieldType instanceof MultipleFieldType);
    }
}
