<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    protected $table = 'categories';  
    protected $primaryKey = 'id';
    protected $fillable = [
        'catname',
        'status	',
    ];
  
public function products()
{
    return $this->hasMany(Product::class, 'cat_id');
}




    use HasFactory;
}
