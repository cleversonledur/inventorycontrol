<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;
    public $table = "product";
    protected $fillable = ['name','category_id'];

}
