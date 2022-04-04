<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $guarded = [''];
    protected $softDelete = true;

    public function method()
    {
        return $this->belongsTo(Method::class);
    }
}
