<?php

namespace App\Tests;

class TestClass
{
    public $value = 0;

    public function increased()
    {
        $this->value++;
        return $this->value;
    }
}
