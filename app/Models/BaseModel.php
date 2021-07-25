<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
