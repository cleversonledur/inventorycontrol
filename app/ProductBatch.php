<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBatch extends Model
{
	
	protected $fillable = ['price','quantity','totalprice','product_id','batch_id'];
	public $timestamps = false;
    public $table = "product_batch";
}
