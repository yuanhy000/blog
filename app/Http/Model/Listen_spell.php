<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Listen_spell extends Model
{
    protected $table = 'listen_spell';
    protected $primaryKey = 'ls_id';
    public $timestamps = false;
    protected $guarded = [];
}
