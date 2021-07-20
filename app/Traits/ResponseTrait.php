<?php

namespace App\Traits;

trait ResponseTrait {

    public function jsonA(){
        return [
            'message' => 'create successfully!',
            'code' => 200
        ];
    }
}
