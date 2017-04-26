<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Icon extends Model
{

    public function Gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

}
