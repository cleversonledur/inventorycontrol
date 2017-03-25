<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	public $timestamps = false;
    public $table = "provider";
    protected $fillable = ['name'];

}
