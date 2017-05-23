<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Icon extends Model
{

    protected $guarded = [];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

}
