<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
   protected $table = 'products';
   protected $primaryKey = 'id';
   protected $fillable = [
       'productname',
       'cat_id',
       'brand_id',
       'price',
   ];
public function catagory()
{
    return $this->belongsTo(Catagory::class,'cat_id');
}
public function brand()
{
    return $this->belongsTo(Brand::class,'brand_id');
}


   use HasFactory;
}
