<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Csapat extends Model
{
    public $primaryKey = "cs_id";
    public $table = "csapatok";
    public $timestamps = false;
    public $guarded = [];
}
