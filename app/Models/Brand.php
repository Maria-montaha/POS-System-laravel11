<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    protected $table = 'brands';  
    protected $primaryKey = 'id';
    protected $fillable = [
        'brandname',
        'status	',
    ];

public function products()
{
    return $this->hasMany(Product::class,'brand_id');
}


  use HasFactory;
}