<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
    protected $primaryKey = 'lan_id';
    public $timestamps = false;
    protected $guarded = [];
}
