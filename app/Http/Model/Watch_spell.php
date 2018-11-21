<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Watch_spell extends Model
{
    protected $table = 'watch_spell';
    protected $primaryKey = 'ws_id';
    public $timestamps = false;
    protected $guarded = [];
}
