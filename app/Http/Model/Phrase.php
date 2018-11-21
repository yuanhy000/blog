<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $table = 'phrase';
    protected $primaryKey = 'ph_id';
    public $timestamps = false;
    protected $guarded = [];
}
