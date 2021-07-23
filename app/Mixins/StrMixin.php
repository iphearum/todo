<?php

namespace App\Mixins;

class StrMixin
{
    public function todo_mixin()
    {
        return function () {
            return 'function todo mixin';
        };
    }
    public function todo_mixin_1()
    {
        return function () {
            return 'function todo mixin 1';
        };
    }
}
