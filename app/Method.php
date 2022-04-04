<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $guarded = [''];
    protected $softDelete = true;

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
