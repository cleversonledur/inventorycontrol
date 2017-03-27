<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{

    public $timestamps = false;
    public $table = "batch";
    protected $fillable = ['provider_id'];
}
