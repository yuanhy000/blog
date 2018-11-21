<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Find_mean extends Model
{
    protected $table = 'find_mean';
    protected $primaryKey = 'fm_id';
    public $timestamps = false;
    protected $guarded = [];
}
