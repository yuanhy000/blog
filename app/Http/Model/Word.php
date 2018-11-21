<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table = 'word';
    protected $primaryKey = 'word_id';
    public $timestamps = false;
    protected $guarded = [];
}
