<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Csapattag extends Model
{
    public $primaryKey = "cst_id";
    public $table = "csapat_tagok";
    public $timestamps = false;
    public $guarded = [];
}
