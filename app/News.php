<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
    	'id', 'name', 'preview_text', 'detail_text', 'counter', 'status', 'category_id'
    ];

    public function category () {
    	return $this->belongsTo('App\Category');
    }
}
