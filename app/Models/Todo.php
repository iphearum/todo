<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends BaseModel
{
    use HasFactory;

    // protected $table = 'todos';

    protected $fillable = ['title', 'body', 'active', 'user_id'];

    protected $guarded = ['created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
        // return $this->hasOne(User::class, 'id', 'user_id');
    }
}
