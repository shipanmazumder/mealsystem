<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function create()
    {
        return $this->belongsTo(User::class,"created_by");
    }
}
