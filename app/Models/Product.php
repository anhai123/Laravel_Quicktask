<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $table = 'products';
      protected $fillable = ['name'];
    
      public $timestamps = true;
    
      public function stores() {
        return $this->belongsToMany('App\Store', 'product_store', 'store_id', 'product_id');
      }
    
    
}
