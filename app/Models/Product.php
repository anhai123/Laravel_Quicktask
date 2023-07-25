<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $table = 'products';
      protected $fillable = ['name'];

      public $timestamps = true;
      protected $primaryKey = 'id';
      public function stores() {
        return $this->belongsToMany('App\Store', 'product_store', 'store_id', 'product_id');
      }
}
